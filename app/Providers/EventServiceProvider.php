<?php

namespace App\Providers;

use App\Events\AddRealItemsEvent;
use App\Events\Billing\AddBonusMoneyEvent;
use App\Events\Billing\AddRealMoneyEvent;
use App\Events\Billing\ChargeBonusMoneyEvent;
use App\Events\Billing\WithdrawalRealMoneyEvent;
use App\Listeners\AddRealItemsListener;
use App\Listeners\Billing\AddMoneyListener;
use App\Listeners\Billing\ChargeMoneyListener;
use App\Listeners\CreateBillingWallets;
use Illuminate\Auth\Events\Registered;
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
            CreateBillingWallets::class
        ],
        WithdrawalRealMoneyEvent::class => [
            ChargeMoneyListener::class
        ],
        ChargeBonusMoneyEvent::class => [
            ChargeMoneyListener::class
        ],
        AddRealItemsEvent::class => [
            AddRealItemsListener::class
        ],
        AddRealMoneyEvent::class => [
            AddMoneyListener::class
        ],
        AddBonusMoneyEvent::class => [
            AddMoneyListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
