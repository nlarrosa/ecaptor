<?php

namespace App\Events;

use App\Models\SaleSketchProducts;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SketchEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $saleSketch;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SaleSketchProducts  $saleSketch)
    {
        $this->saleSketch = $saleSketch;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
