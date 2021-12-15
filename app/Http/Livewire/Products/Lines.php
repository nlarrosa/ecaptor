<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Line;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Lines extends Component
{
    use WithPagination;

    public  $categories;
    public  $categoryFilter; 
    public  $search;   


    
    public function mount()
    {
        $this->categories = Category::all();
        $this->categoryFilter = '';
        $this->search = '';
    }


    
    private function getLines(): LengthAwarePaginator
    {
        return Line::query()

        ->when($this->categoryFilter, function($query){
            $query->where('category_id', $this->categoryFilter);
        })
        ->when($this->search, function($query){
            $query->where('name', 'LIKE', '%'.$this->search.'%');
        })
        ->paginate(1000);
    }


    public function updatingCategoryFilter($value)
    {
        $this->resetPage();
    }



    public function render()
    {
        $lines = $this->getLines();

        return view('livewire.products.lines', [
            'lines' => $lines,
        ]);
    }
}
