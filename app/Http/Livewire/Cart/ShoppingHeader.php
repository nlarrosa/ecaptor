<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class ShoppingHeader extends Component
{

    protected $listeners = [
        'countCart' => 'getCountCart',
    ];



    public function mount()
    {
        $this->getCountCart();
    }


    public function getCountCart(): void
    {
        $this->cantCart = 0;

        ( !empty(session()->get('cart')) ) 
        ?  $this->cantCart = count(session()->get('cart')) 
        :  $this->cantCart;
    }


    public function goToCart()
    {
        return redirect('/cart');
    }


    public function render()
    {
        return view('livewire.cart.shopping-header');
    }
}
