<?php

namespace App\Http\Livewire\Home;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SketchList extends Component
{

    public $notificationsSketch;
    public $user;


    public function mount()
    {
        $this->user = Auth()->user(); 
        $this->notificationsSketchs = $this->user->Notifications;
    }


    public function goToSketchConfirm(int $sketchId, string $notifyId)
    {
        redirect()->route('sketch.confirm', ['id' => $sketchId, 'notifyId' => $notifyId]);
    }


    public function render()
    {
        return view('livewire.home.sketch-list');
    }
}
