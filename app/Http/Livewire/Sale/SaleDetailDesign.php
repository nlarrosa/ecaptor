<?php

namespace App\Http\Livewire\Sale;

use App\Models\SaleColorProducts;
use App\Models\SaleProduct;
use Exception;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class SaleDetailDesign extends Component
{


    public string $modalOpen;
    public $saleProduct;
    public array $arrColorBase;
    public array $arrColorLogo;
    public array $arrColorLetras;
    public array $arrColorBordes;
    public string $baseColors;
    public string $logoColors;
    public string $letrasColors;
    public string $bordesColors;

    protected $listeners = [
        'openModalDetailDesign' => 'openModalSaleDetailDesign',
    ];




    public function mount()
    {
        $this->saleProduct    = '';
        $this->modalOpen      = '';
    }
        


    public function openModalSaleDetailDesign(int $saleProductId): void
    {
        $this->modalOpen   = 'modal-open';
        $this->saleProduct = SaleProduct::findOrFail($saleProductId);
        $colorProducts = SaleColorProducts::where('sale_product_id', $saleProductId)->get();
        $sector = '';
        $this->arrColorBase   = [];
        $this->arrColorLogo   = [];
        $this->arrColorLetras = [];
        $this->arrColorBordes = [];
        $this->baseColors   = '';
        $this->logoColors   = '';
        $this->letrasColors = '';
        $this->bordesColors = '';

        foreach($colorProducts as $colorProduct)
        {
            switch ($colorProduct->sector) {
                case 'base':
                    array_push($this->arrColorBase, $colorProduct->Color->name.' ['.$colorProduct->Color->code.']');
                    break;
                case 'logo':
                    array_push($this->arrColorLogo, $colorProduct->Color->name.' ['.$colorProduct->Color->code.']');
                    break;
                case 'letras':
                    array_push($this->arrColorLetras, $colorProduct->Color->name.' ['.$colorProduct->Color->code.']');
                    break;
                case 'bordes':
                    array_push($this->arrColorBordes, $colorProduct->Color->name.' ['.$colorProduct->Color->code.']');
                    break;
                default:
                    break;
            }
        }

        $this->baseColors   = implode(' , ', $this->arrColorBase);
        $this->logoColors   = implode(' , ', $this->arrColorLogo);
        $this->letrasColors = implode(' , ', $this->arrColorLetras);
        $this->bordesColors = implode(' , ', $this->arrColorBordes);
    }




    public function printPlanilla()
    {
        try {

            $fileName = 'planilla_pedido_'.$this->saleProduct->id;
            $data = [
                'saleProduct'  => $this->saleProduct,
                'baseColors'   => $this->baseColors,
                'logoColors'   => $this->logoColors,
                'letrasColors' => $this->letrasColors,
                'bordesColors' => $this->bordesColors,
            ];
    
            return response()->streamDownload(function () use ($data) {
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadView('sale.sale-detail-design', $data);
                echo $pdf->stream();
            }, $fileName);


        } catch (Exception $e) {
            
            dd($e->getMessage());
        }
    }



    public function render()
    {
        return view('livewire.sale.sale-detail-design');
    }
}
