<?php

namespace App\Http\Livewire\Cart;

use App\Models\Sale;
use App\Models\SaleColorProducts;
use App\Models\SaleProduct;
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
        (session()->get('cart')) 
        ? $this->cart = session()->get('cart')
        : $this->cart = [];

        $this->generateTotalCart();
    }



    /**
     * Genera los datos totales de la compra
     * Sumando los items agregadios al carrito
     * 
     */
    private function generateTotalCart(): void
    {
        $this->subtotal = 0;
        $this->totalBordes = 0;
        $this->impuestos = 0;
        $this->total = 0;

        foreach($this->cart as $indice => $data)
        {
            $this->subtotal = $data[0]['product']['priceTotal'] + $this->subtotal;
            $this->subtotal = round($this->subtotal, 2, PHP_ROUND_HALF_UP);

            $this->totalBordes = $data[0]['bordes']['precio'] + $this->totalBordes;
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
        $userId = Auth::user()->id;
        $sales = session()->get('cart');

        // dd($sales);  

        foreach($sales as $productId => $sale)
        {

            $saleId = Sale:: create([
                'user_id' => $userId,
                'sale_status_id' => config('ecaptor.saleStatus.nuevo'),
            ]);


            $saleProduct = SaleProduct::create([
                'sale_id'     => $saleId->id,
                'product_id'  =>  $sale[0]['product']['id'],
                'quantity'    => $sale[0]['cantidad'],
                'unit_price'  => $sale[0]['product']['price'],
                'total_price' => $sale[0]['product']['priceTotal'],
            ]);

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
        }

        
        session()->forget('cart');

        $this->dispatchBrowserEvent('ModalAlert', [
            'icon'  => 'success',
            'title' => 'Su Pedido se Envio Correctamente',
        ]);
    }




    public function render()
    {
        return view('livewire.cart.shopping-cart');
    }
}
