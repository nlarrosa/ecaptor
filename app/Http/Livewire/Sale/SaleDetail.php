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

        if($this->saleProduct->Product->Line->design == 'Logo')
        {
            if($this->saleProduct->Sale->sale_status_id != config('ecaptor.saleStatus.nuevo'))
            {

                if($this->saleProduct->SaleSketch->status_sketch_id == 2)
                {
                    $this->buttonStatus = [
                        'action' => '',
                        'title'  => 'Enviar a Produccion',
                        'color'  => 'info',
                        'disabled' => 'disabled',
                    ];
                }

                if($this->saleProduct->SaleSketch->status_sketch_id == 3)
                {
                    $this->buttonStatus = [
                        'action' => '',
                        'title'  => 'Enviar a Produccion',
                        'color'  => 'info',
                        'disabled' => '',
                    ];
                }
            }

        } else {

            $this->buttonStatus = [
                'action' => '',
                'title'  => 'Enviar a Preparacion',
                'color'  => 'warning',
                'disabled' => '',
            ];
        }

    }






    public function render()
    {
        return view('livewire.sale.sale-detail');
    }
}
