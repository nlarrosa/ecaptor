<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class Alert extends Component
{

    public $message;
    public $status;
    public $icon;
    public $color;

    public function mount( $message, $status )
    {
        $this->message = $message;
        $this->status  = $status;
        $this->settingByStatus();
    }


    

    private function settingByStatus()
    {
        switch ($this->status) {

            case 'error':
                $this->icon  = 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636';
                $this->color = 'red';
            break;

            case 'success':
                $this->icon  = 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z';
                $this->color = 'green';
            break;

            case 'info':
                $this->icon  = 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
                $this->color = 'info';
            break;

            case 'warning':
                $this->icon  = 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z';
                $this->color = 'warning';
            break;
            
            default:
                $this->icon  = 'M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z';
                $this->color = 'green';
            break;
        }
    }




    public function render()
    {
        return view('livewire.ui.alert');
    }
}
