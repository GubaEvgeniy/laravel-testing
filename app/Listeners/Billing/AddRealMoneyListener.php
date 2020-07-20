<?php


namespace App\Listeners\Billing;


use App\Events\Billing\AddRealMoneyEvent;
use Illuminate\Support\Facades\DB;

class AddRealMoneyListener
{
    public function handle(AddRealMoneyEvent $event)
    {
        DB::transaction(function () use ($event) {
            $event->getWallets()->increment('amount', $event->getAmount());
        });
    }
}
