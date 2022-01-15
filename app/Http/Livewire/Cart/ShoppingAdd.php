<?php

namespace App\Http\Livewire\Cart;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ShoppingAdd extends Component
{
    use WithPagination;

    public  $lineId;
    public  $searchWidth;  
    public  $searchHeight; 
    public  $customProduct;

    /** CART */
    public $cantidad;



    public function mount($id)
    {
        $this->lineId = $id;
        $this->searchWidth = '';
        $this->searchHeight = '';
        $this->cantidad = [];
        $this->customProduct = Product::getProductCustomizeByLineId($this->lineId);
    }
    
    
    
    private function getProductsByLineId(): LengthAwarePaginator
    {
        return Product::query()
        ->where('line_id', $this->lineId)
        ->where('type_product_id', config('ecaptor.product.type.estandar'))

        ->when($this->searchWidth, function($q){
            $q->where('width', 'LIKE', '%'.$this->searchWidth.'%');
        })
        ->when($this->searchHeight, function($q){
            $q->where('height', 'LIKE', '%'.$this->searchHeight.'%');
        })
        ->paginate(1000);
        
    }



    public function addCart(int $productId)
    {
        $this->dispatchBrowserEvent('cartStepsModal', ['productId' => $productId]);
    }



    public function resetSearch(): void
    {
        $this->searchWidth = '';
        $this->searchHeight = '';
    }
    
    
    
    public function render()
    {
        $products = $this->getProductsByLineId();

        return view('livewire.cart.shopping-add', [
            'products' => $products
        ]);
    }
}
