<?php

namespace App\Http\Livewire\Cart;

use App\Models\Sale;
use App\Models\SaleBorderProducts;
use App\Models\SaleColorProducts;
use App\Models\SaleDesignProducts;
use App\Models\SaleProduct;
use Exception;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component

{


    public array $cart;
    public array $cartDetail;
    public float $subtotal;
    public string $totalBordes;
    public string $impuestos;
    public string $total;




    public function mount()
    {
        // session()->forget('cart');
        (session()->get('cart')) 
        ? $this->cart = session()->get('cart')
        : $this->cart = [];

        // dd($this->cart);
        // session()->forget('cart');
        $this->generateTotalCart();
    }



    /**
     * Genera los datos totales de la compra
     * Sumando los items agregadios al carrito
     * 
     */
    public function generateTotalCart(): void
    {
        $this->subtotal = 0;
        $this->totalBordes = 0;
        $this->impuestos = 0;
        $this->total = 0;

        foreach($this->cart as $indice => $data)
        {
            $this->subtotal = $data[0]['product']['priceTotal'] + $this->subtotal;
            $this->subtotal = round($this->subtotal, 2, PHP_ROUND_HALF_UP);

            $this->totalBordes = $data[0]['bordes']['totalPrice'] + $this->totalBordes;
            $this->totalBordes = round($this->totalBordes, 2, PHP_ROUND_HALF_UP);
        }

        $this->impuestos = (($this->subtotal + $this->totalBordes) * 21) / 100;
        $this->impuestos = round($this->impuestos, 2, PHP_ROUND_HALF_UP);
        $this->total = $this->subtotal +  $this->totalBordes + $this->impuestos;
    }



    /**
     * Elimina un item del carrito y de ls
     * session del cart
     */
    public function deleteItemCart($productId): void
    {
        session()->forget('cart.'.$productId);
        Arr::forget($this->cart, $productId);
        $this->generateTotalCart();
        $this->emit('countCart');
    }



    public function goToLines()
    {
        redirect()->route('lines');
    }



    public function createSale()
    {
        try 
        {
            $userId = Auth::user()->id;
            $sales = session()->get('cart');
            
            foreach($sales as $productId => $sale)
            {

                /** Creamos la venta */
                $saleId = Sale:: create([
                    'user_id' => $userId,
                    'sale_status_id' => config('ecaptor.saleStatus.nuevo'),
                ]);

                
                /** Guardamos los items de los productos de la venta */
                $saleProduct = SaleProduct::create([
                    'sale_id'     => $saleId->id,
                    'product_id'  => $sale[0]['product']['id'],
                    'quantity'    => $sale[0]['cantidad'],
                    'unit_price'  => $sale[0]['product']['price'],
                    'total_price' => $sale[0]['product']['priceTotal'],
                    'format'      => $sale[0]['formato'],
                    'width'       => $sale[0]['product']['width'],
                    'height'      => $sale[0]['product']['height'],
                ]);


                /** Guardamos los colores del producto */
                foreach($sale[0]['color'] as $sector => $colores)
                {
                    foreach($colores as $colorId => $color)
                    {
                        SaleColorProducts::create([
                            'sale_product_id' => $saleProduct->id,
                            'color_id' => $colorId,
                            'sector' => $sector,
                        ]);
                    }
                }

                /** Guardamos los datos de bordes del producto */
                $border = SaleBorderProducts::create([
                    'quantity'        => $sale[0]['bordes']['cant'],
                    'lados'           => $sale[0]['bordes']['lados'],
                    'type'            => $sale[0]['bordes']['tipo'],
                    'unite_price'     => $sale[0]['bordes']['unitePrice'],
                    'total_price'     => $sale[0]['bordes']['totalPrice'],
                    'mts_lineal'      => $sale[0]['bordes']['mts'],
                    'sale_product_id' => $saleProduct->id,
                ]);


                /** Guradmos los datos del diseño siempre que sea con logo */
                if($sale[0]['design']['type'] != config('ecaptor.design.type.liso'))
                {
                    (!empty( $sale[0]['design']['comment']))
                    ? $desigComment = $sale[0]['design']['comment']
                    : $desigComment = '';

                    SaleDesignProducts::create([
                        'type' => $sale[0]['design']['type'],
                        'design_content'   => $sale[0]['design']['content'],
                        'design_comments'  => $desigComment,
                        'sale_product_id'  => $saleProduct->id,
                        'status_sketch_id' => config('ecaptor.sketchStatus.id.sinenviar'),
                    ]);
                }
            }


            session()->forget('cart');

            $this->dispatchBrowserEvent('ModalAlertTimerRedirect', [
                'text'  => '¡Gracias por su Compra!',
                'title' => 'Pedido Confirmado',
                'url'   => route('sale.list'),
            ]);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }




    public function render()
    {
        return view('livewire.cart.shopping-cart');
    }
}
