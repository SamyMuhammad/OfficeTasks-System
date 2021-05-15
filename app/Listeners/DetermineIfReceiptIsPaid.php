<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DetermineIfReceiptIsPaid
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $receipt = $event->receipt;

        if ($receipt->paid == $receipt->total) {
            $receipt->update(['status' => 'paid']);
        }else{
            $receipt->update(['status' => 'unpaid']);
        }
    }
}
