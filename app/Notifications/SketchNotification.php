<?php

namespace App\Notifications;

use App\Models\SaleSketchProducts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SketchNotification extends Notification
{
    use Queueable;

    public $saleSketch;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(SaleSketchProducts $saleSketch)
    {
        $this->saleSketch = $saleSketch;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'sketch_id'     => $this->saleSketch->id,
            'file_name'     => $this->saleSketch->file_name,
            'sale_product_id'       => $this->saleSketch->sale_product_id,
            'sketch_status' => $this->saleSketch->StatusSketch->name,
        ];
    }
}
