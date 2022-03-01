<?php

namespace App\Http\Livewire\Sale;

use App\Models\SaleProduct;
use App\Models\SaleSketchProducts;
use Livewire\Component;


class SaleDetail extends Component
{
    
    public string $modalOpen;
    public $statusSketch;
    public $saleProduct;
    public $saleSketch;
    public array $buttonStatus;


    protected $listeners = [
        'openModalDetail' => 'openModalSaleDetail',
    ];




    public function mount()
    {
        $this->saleProduct  = '';
        $this->modalOpen    = '';
        $this->statusSketch = '';
        $this->saleSketch   = '';
        $this->buttonStatus = [];
    }



    public function openModalSaleDetail(int $saleProductId): void
    {
        $this->modalOpen    = 'modal-open';
        $this->saleProduct  = SaleProduct::findOrFail($saleProductId);
        $this->saleSketch   = SaleSketchProducts::where('sale_product_id', $saleProductId)->first();
        $this->generateStatus();
    }



    public function generateStatus()
    {
        $this->buttonStatus = [];

        /** chequeo primero si es con logo porque el proceso es distinto */
        if($this->saleProduct->Product->Line->design == 'Logo')
        {
            if($this->saleProduct->Sale->sale_status_id != config('ecaptor.saleStatus.nuevo'))
            {
                /** Si no es nuevo y esta enviado la muestra deshabilito los botones */
                if($this->saleProduct->SaleSketch->status_sketch_id == 2)
                {
                    $this->buttonStatus = [
                        'action' => 'produccion',
                        'title'  => 'Enviar a Produccion',
                        'color'  => 'info',
                        'disabled' => 'disabled',
                    ];
                }

                /** Si no es nuevo y esta aprobado la muestra habilito y veo los estados  */
                if($this->saleProduct->SaleSketch->status_sketch_id == 3)
                {
                    if($this->saleProduct->Sale->sale_status_id == config('ecaptor.saleStatus.preparacion'))
                    {
                        $this->buttonStatus = [
                            'action' => 'produccion',
                            'title'  => 'Enviar a Produccion',
                            'color'  => 'info',
                            'disabled' => '',
                        ];
                    }

                    if($this->saleProduct->Sale->sale_status_id == config('ecaptor.saleStatus.produccion'))
                    {
                        $this->buttonStatus = [
                            'action' => 'finalizar',
                            'title'  => 'Finalizar',
                            'color'  => 'success',
                            'disabled' => '',
                        ];
                    }

                    if($this->saleProduct->Sale->sale_status_id == config('ecaptor.saleStatus.finalizado'))
                    {
                        $this->buttonStatus = [];
                    }
                }
            }

        } else {

            if($this->saleProduct->Sale->sale_status_id == config('ecaptor.saleStatus.nuevo'))
            {
                $this->buttonStatus = [
                    'action' => 'preparacion',
                    'title'  => 'Enviar a Preparacion',
                    'color'  => 'warning',
                    'disabled' => '',
                ];
            }

            if($this->saleProduct->Sale->sale_status_id == config('ecaptor.saleStatus.preparacion'))
            {
                $this->buttonStatus = [
                    'action' => 'produccion',
                    'title'  => 'Enviar a Produccion',
                    'color'  => 'info',
                    'disabled' => '',
                ];
            }

            if($this->saleProduct->Sale->sale_status_id == config('ecaptor.saleStatus.produccion'))
            {
                $this->buttonStatus = [
                    'action' => 'finalizar',
                    'title'  => 'Finalizar',
                    'color'  => 'success',
                    'disabled' => '',
                ];
            }
        }

    }






    public function render()
    {
        return view('livewire.sale.sale-detail');
    }
}
