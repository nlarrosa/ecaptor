<?php

namespace App\Listeners;

use App\Events\SketchEvent;
use App\Models\SaleSketchProducts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SketchListener
{

    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SketchEvent $event)
    {
        dd($event->saleSketch);
    }
}
