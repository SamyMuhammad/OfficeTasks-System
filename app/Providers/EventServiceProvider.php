<?php

namespace App\Providers;

use App\Events\ReceiptPaymentAction;
use App\Events\ReceiptCreated;
use App\Events\ReceiptUpdated;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\DetermineIfReceiptIsPaid;
use App\Listeners\CreateReceiptPayment;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ReceiptPaymentAction::class => [
            DetermineIfReceiptIsPaid::class,
        ],
        ReceiptCreated::class => [
            CreateReceiptPayment::class,
        ],
        ReceiptUpdated::class => [
            DetermineIfReceiptIsPaid::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
