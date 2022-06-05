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
        $this->notificationsSketchs = $this->user->unreadNotifications;
        $this->totalNotifications = count($this->notificationsSketchs);
    }


    
    /** Limpia la nopstificaciones de las muestras una vez
     * que las ve el usuario
     */
    public function goToSketchConfirm(int $sketchId, string $notifyId)
    {
        redirect()->route('sketch.confirm', ['id' => $sketchId, 'notifyId' => $notifyId]);
    }



    /** Limpia las notificaciones de las muestras una ves
     * que las ve el administrador
     */
    public function markReadNotifyAdmin(string $notifyId)
    {
        Auth()->user()->notifications->where('id', $notifyId)->first()->markAsRead();
    }



    public function render()
    {
        return view('livewire.notification.header-notification');
    }
}
