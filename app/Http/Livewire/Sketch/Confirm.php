<?php

namespace App\Http\Livewire\Sketch;

use App\Models\SaleSketchProducts;
use App\Models\User;
use App\Notifications\SketchNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Confirm extends Component
{

    public $saleSketch;
    public $imagePath;
    public $btnDisabledConfirm;
    public $btnDisabledModify;
    public $saleSketchStatus;
    public int $saleSketchId;


    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];



    public function mount(int $id, string $notifyId)
    {
        $this->saleSketchId = $id;
        $this->btnDisabledConfirm = '';
        $this->btnDisabledModify  = '';
        $this->init($this->saleSketchId);
        $notify =  Auth()->user()->notifications->where('id', $notifyId)->first()->markAsRead();
    }
    
    
    
    
    public function init(int $id)
    {
        $this->saleSketch = SaleSketchProducts::where('id', $id)->first();
        $this->imagePath  = url('storage/sketchs/'. $this->saleSketch->file_name);

        $this->saleSketchStatus = [
            'status' => $this->saleSketch->StatusSketch->name,
            'color'  => $this->saleSketch->StatusSketch->color,
        ];
        
        if($this->saleSketch->status_sketch_id == config('ecaptor.sketchStatus.id.aprobado'))
        {
            $this->btnDisabledConfirm = 'disabled';
            $this->btnDisabledModify  = 'disabled';
        }
    }




    public function confirmSketch()
    {
        if($this->saleSketch->status_sketch_id == config('ecaptor.sketchStatus.id.enviado'))
        {
            $this->saleSketch->status_sketch_id = config('ecaptor.sketchStatus.id.aprobado');
            $this->saleSketch->update();
            
            $this->dispatchBrowserEvent('ModalAlertTimerSketch', [
                'icon'   => 'success',
                'title'  => 'Se envio la Aprobacion del Boceto',
            ]);

            $this->btnDisabledConfirm = 'disabled';
            $this->btnDisabledModify  = 'disabled';
            $this->init($this->saleSketchId);
        }
    }




    public function rechazarSketch()
    {
        if($this->saleSketch->status_sketch_id == config('ecaptor.sketchStatus.id.enviado'))
        {
            $this->saleSketch->status_sketch_id = config('ecaptor.sketchStatus.id.modificar');
            $this->saleSketch->update();

            $this->dispatchBrowserEvent('ModalAlertTimerSketch', [
                'icon' => 'success',
                'title' => 'Se envio la Modificación del Boceto',
            ]);
        }
    }


    public function sendNotification()
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->notify(new SketchNotification($this->saleSketch));
    }



    public function render()
    {
        return view('livewire.sketch.confirm');
    }
}
