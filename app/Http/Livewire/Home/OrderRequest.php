<?php

namespace App\Http\Livewire\Home;

use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderRequest extends Component
{

    public $orders;



    public function mount()
    {
        $this->orders = '';
        $this->init();
    }


    public function init()
    {
        $this->orders = Sale::where('user_id', Auth()->user()->id)
        ->orderBy('id', 'DESC')
        ->limit(5)
        ->get();

    }


    public function render()
    {
        return view('livewire.home.order-request');
    }
}
