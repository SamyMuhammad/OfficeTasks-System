<?php

namespace App\Listeners;

use App\Events\ReceiptCreated;
use App\Models\ReceiptPayment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateReceiptPayment
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
     * @param ReceiptCreated $event
     * @return void
     */
    public function handle(ReceiptCreated $event)
    {
        $receiptId = $event->receipt->id;
        $amount = $event->paid;
        
        ReceiptPayment::create([
            'receipt_id' => $receiptId,
            'amount' => $amount
        ]);
    }
}
