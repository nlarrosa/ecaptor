<?php

namespace App\Http\Livewire\Sketch;

use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\SaleSketchProducts;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadSketch extends Component
{

    use WithFileUploads;


    public string $modalOpen;
    public $sketchs;
    public int $saleProductId;


    protected $listeners = [
        'openModalUploadSendSketch' => 'openModalUploadSketch',
    ];



    protected $messages = [
        'sketchs.*.required'  => 'Debe subir una Imagen para Enviar',
        'sketchs.*.mimes'     => 'El Formato del Archivo es Incorrecto',
    ];



    
    public function mount()
    {
        $this->modalOpen = '';
        $this->sketchs   = [];
    }



    
    public function openModalUploadSketch(int $saleProductId)
    {
        $this->modalOpen   = 'modal-open';
        $this->saleProductId = $saleProductId;
    }




    public function saveSketchs(): void
    {

        $this->validate([
            'sketchs.*' => 'required|mimes:jpg,jpeg,png|max:20480',
        ]);


        foreach($this->sketchs as $sketch)
        {
            $fileName = $sketch->getClientOriginalName();
            $extension = $sketch->getClientOriginalExtension();
            $sketch->storeAs('/sketchs', $fileName, 'public');
            Storage::disk('local')->delete('/livewire-temp/'.$sketch->getFilename());

            $sketchProduct = SaleSketchProducts::getStatusBySaleProductId( $this->saleProductId);

            if($sketchProduct['statusId'] == 1)
            {
                SaleSketchProducts::create([
                    'file_name' => $fileName,
                    'sale_product_id' => $this->saleProductId,
                    'status_sketch_id' => $sketchProduct['statusId'] + 1
                ]);

            } else {

                $sketchProduct = SaleSketchProducts::findOrFail($this->saleProductId);
                $sketchProduct->delete();

                SaleSketchProducts::create([
                    'file_name' => $fileName,
                    'sale_product_id' => $this->saleProductId,
                    'status_sketch_id' => config('ecaptor.sketchStatus.id.enviado')
                ]);
            }
        }
        
        $saleProduct = SaleProduct::findOrFail($this->saleProductId);
        Sale::saleStatusToUpdate($saleProduct->sale_id);

        $this->modalOpen   = '';
        $this->sketchs     = [];

        $this->dispatchBrowserEvent('statusSale');

        $this->dispatchBrowserEvent('ModalAlertTimer', [
            'icon'  => 'success',
            'title' => 'La Muestra se Envio Correctamente',
        ]);
    }



    public function render()
    {
        return view('livewire.sketch.upload-sketch');
    }
}
