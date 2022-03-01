<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;

class HeaderNotification extends Component
{


    public $user;
    public $notificationsSketchs;
    public $totalNotifications;



    public function mount()
    {
        $this->user = Auth()->user(); 
        $this->notificationsSketchs = $this->user->unreadNotifications ;
        $this->totalNotifications = count($this->notificationsSketchs);
    }



    public function goToSketchConfirm(int $sketchId, string $notifyId)
    {
        redirect()->route('sketch.confirm', ['id' => $sketchId, 'notifyId' => $notifyId]);
    }



    public function render()
    {
        return view('livewire.notification.header-notification');
    }
}
