<?php

namespace App\Events;

use App\Models\ReceiptPayment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ReceiptPaymentAction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The payment instance.
     *
     * @var \App\Models\ReceiptPayment
     */
    public $payment;

    /**
     * The payment instance.
     *
     * @var \App\Models\Receipt
     */
    public $receipt;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ReceiptPayment $payment)
    {
        $this->payment = $payment;
        $this->receipt = $payment->receipt;
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
