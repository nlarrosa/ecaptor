<?php

namespace App\Http\Livewire\Products;

use App\Imports\ProductImport;
use App\Models\ProductUpload;
use App\Models\Category;
use App\Models\Line;
use App\Models\Product;
use App\Models\TypeProduct;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UploadProduct extends Component
{

    use WithFileUploads;


    public $fileProduct;
    public $productsUploads;


    protected $rules = [
        'fileProduct' => 'required',
        'fileProduct' => 'file|mimes:xlsx|max:102400',
    ];

    protected $messages = [
        'fileProduct.required' => 'The file is required.',
    ];


    public function mount()
    {
        $this->fileProduct = '';
        $this->getProductsUploads();
    }


    private function getProductsUploads()
    {
        $this->productsUploads = ProductUpload::all();
    }


    public function uploadProductFile()
    {
        $this->validate();
       
        if($this->productsUploads)
           ProductUpload::truncate();


        $extension = $this->fileProduct->getClientOriginalExtension();
        $fileName = 'products_import.' . $extension;
        $this->fileProduct->storeAs('/product/importacion', $fileName, 'public');

        if($this->importDataProducts())
        {
            $this->getProductsUploads();
            $this->generateDataProducts();
        }
    }


    private function importDataProducts(): bool
    {
        try {

            $importProducts = new ProductImport();
            Excel::import($importProducts, storage_path('app/public/product/importacion/products_import.xlsx')); 
            return true;

        } catch (Exception $e) {
            dd($e->getMessage());
        }
        
    }



    public function generateDataProducts()
    {
        $category = '';
        $line = '';

        foreach($this->productsUploads as $data)
        {
            if($category != $data->category)
            {
                $categoryId = Category::create([ 
                    'name' => $data->category,
                    'description' => $data->desc_product
                ]);

                $category = $data->category;
            }


            if($line != $data->line)
            {
                $lineId = Line::create([
                    'name' => $data->name_line,
                    'type' => $data->type_transit,
                    'details' => $data->desc_line,
                    'image_line'  => 'img_1',
                    'category_id' => $categoryId->id,
                ]);

                $line = $data->line;
            }


            $type = TypeProduct::where('type', $data->type_medida)->first();

            Product::create([
                'name' => $data->name_product,
                'width' => $data->width,
                'height' => $data->height,
                'price' => $data->price,
                'price_suggest' => $data->price_suggest,
                'details' => $data->desc_product,
                'line_id' => $lineId->id,
                'stock' => 1,
                'type_product_id' => $type->id
            ]);
        }
    }



    public function render()
    {
        return view('livewire.products.upload-product');
    }
}
