<?php

namespace App\Events;

use App\Models\Receipt;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReceiptCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The payment instance.
     *
     * @var \App\Models\Receipt
     */
    public $receipt;

    /**
     * The paid amount.
     */
    public $paid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Receipt $receipt, $paid)
    {
        $this->receipt = $receipt;
        $this->paid = $paid;
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
