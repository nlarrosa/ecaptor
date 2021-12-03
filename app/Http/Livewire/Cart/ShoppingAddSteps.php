<?php

namespace App\Http\Livewire\Cart;

use App\Models\Border;
use Illuminate\Support\Arr;
use Livewire\Component;

class ShoppingAddSteps extends Component
{


    public  string $modalOpen;
    public  int    $cantidad;
    public  int    $productId;
    public  string $border;
    public  string $borderLados;
    public  string $borderType;
    public  int    $step;
    public  array  $arrCartSetting;
    public  string $typeLogo;
    public  string $borderCss;



    protected $listeners = [
        'openModalSteps' => 'openModalSettingCart',
    ];




    public function mount()
    {
        $this->modalOpen   = '';
        $this->cantidad    = 1;
        $this->border      = 0;
        $this->borderLados = '';
        $this->borderType  = '';
        $this->step        = 1;
        $this->productId   = 0;
        $this->arrCartSetting = [];
        $this->typeLogo    = 'File';
        $this->borderCss   = '';

    }


    /** Abrimos el modal y recibimos el producto id
     * que vamos a generar el  setting para cargar
     */
    public function openModalSettingCart($productId): void
    {
        $this->modalOpen = 'modal-open';
        $this->productId = $productId;
    }



    public function cartSetting()
    {
        switch ($this->step) {

            case '1':
                $this->borderSetting();
            break;

            case '2':
                $this->designSetting();
            break;

            case '3':
                $this->borderSetting();
            break;
        }
    }


    /**
     * Agrega al array de carrito los datos seleccionados
     * referido a los bordes yla cantidad
     */
    private function borderSetting()
    {
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'product',      $this->productId);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'cantidad',     $this->border);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.cant',  $this->border);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.lados', $this->borderLados);
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'bordes.tipo',  $this->borderType);

        dd($this->arrCartSetting);
        $this->step = $this->step + 1;
    }



    public function designSetting()
    {
        $this->arrCartSetting = Arr::add($this->arrCartSetting, 'design.file',  $this->border);
    }




    /** Actualizo los select de bordes segun la cantidad
     * mayor a 1 unidad
     */
    public function updatingBorder($value)
    {
        if($value == 0)
        {
            $this->borderLados = '';
            $this->borderType  = '';
            $this->borderCss = Border::getCssUbicacionBorde('');
        }
    }



    /** Actualizo los select de bordes Ubicacion
     *  segun si seleccione o no antitropiezo
     */
    public function updatingBorderType($value)
    {
        if($value == 'TERMOFUNDIDO')
        {
            $this->borderLados = 'COMPLETOS';
            $this->borderCss = Border::getCssUbicacionBorde('COMPLETOS');
        }else{
            $this->borderLados = '';
            $this->borderCss = Border::getCssUbicacionBorde('');
        }
    }


    public function updatingBorderLados($value)
    {
        $this->borderCss = Border::getCssUbicacionBorde($value);
    }
    


    public function cartReset()
    {
        $this->modalOpen = '';
        $this->step = 1;
        $this->cantidad    = 1;
        $this->border      = 0;
        $this->borderLados = '';
        $this->borderType  = '';
        $this->productId   = 0;
        $this->arrCartSetting = [];
        $this->typeLogo    = 'File';
        $this->borderCss   = '';

    }



    public function render()
    {
        return view('livewire.cart.shopping-add-steps');
    }
}
