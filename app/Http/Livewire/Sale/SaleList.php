<?php

namespace App\Http\Livewire\Sale;

use App\Models\Sale;
use App\Models\SaleDesignProducts;
use App\Models\SaleProduct;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class SaleList extends Component
{

    use WithPagination;

    public int $registersView;


    protected $listeners = [
        'updateStatusSale' => '$refresh',
        'updateStatus'     => 'updateSaleStatus',
        'cancelSale'       => 'cancelSale',
    ];


    public function mount()
    {
        $this->registersView = 25;
        $this->modalOpen  = 'modal-open';
    }





    public function openModalDetail(int $saleProductId)
    {
        $this->dispatchBrowserEvent('openModalSaleDetail', ['saleProductId' => $saleProductId ]);
    }




    public function openModalDetailDesign(int $saleProductId)
    {
        $this->dispatchBrowserEvent('openModalSaleDesign', ['saleProductId' => $saleProductId ]);
    }



    public function openModalSketchUpload(int $saleProductId)
    {
        $this->dispatchBrowserEvent('openModalSendSketch', ['saleProductId' => $saleProductId ]);
    }
    

    
    public function openModalConfirmCancel(int $saleId)
    {
        $this->dispatchBrowserEvent('ModalAlertConfirmCancel', [
            'saleId'  => $saleId,
        ]);
    }



    public function downloadLogoFile(int $saleProductId)
    {

        $saleProductDesign = SaleDesignProducts::where('sale_product_id', $saleProductId)->first();
        $this->asignResponsability($saleProductId);


        if($saleProductDesign->type == config('ecaptor.design.type.texto'))
        {
            $fileName = 'pedido_'.$saleProductId.'.pdf';
            $title    = '<h3>Diseño de Texto: <p>pedido n° - '.$saleProductId.'</p></h3>';
            $diseño   = '<div style="padding: 10px; border-style: solid; border-width: 5px; text-align:center; vertical-align: middle;">
                        <h1>'.$saleProductDesign->design_content.'</h1>
                        </div>';
            $archivo  = $title.$diseño;

            return response()->streamDownload(function () use ($archivo) {
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML($archivo);
                echo $pdf->stream();
            }, $fileName);

        } else {

            $file = storage_path('app/public/logos/'.$saleProductDesign->design_content);
            return response()->download($file);
        }
    }




    public function updateSaleStatus(int $saleId, string $action, int $saleProductId)
    {

        $sale = Sale::findOrFail($saleId);
        
        switch ($action) {

            case 'preparacion':
                $sale->sale_status_id = config('ecaptor.saleStatus.preparacion');
                $sale->update();
                $this->asignResponsability($saleProductId);
                break;

            case 'produccion':
                $sale->sale_status_id = config('ecaptor.saleStatus.produccion');
                $sale->update();
                break;

            case 'finalizar':
                $sale->sale_status_id = config('ecaptor.saleStatus.finalizado');
                $sale->update();
                break;
            
            default:
                break;
        }
    }



    public function asignResponsability(int $saleProductId)
    {
        $saleProduct = SaleProduct::findOrFail($saleProductId);
        $sale = Sale::findOrFail($saleProduct->sale_id);
        
        if(empty($sale->responsability))
        {
            $sale->responsability = Auth()->user()->name.' '.Auth()->user()->last_name;
            $sale->update();
        }
    }



    public function cancelSale(int $saleId)
    {
        $sale = Sale::findOrFail($saleId);
        $sale->sale_status_id = config('ecaptor.saleStatus.anulado');
        $sale->update();
    }
    



    public function render()
    {
        return view('livewire.sale.sale-list', [
            'saleProducts' => SaleProduct::orderBy('sale_id', 'DESC')->paginate($this->registersView),
        ]);
    }
}
