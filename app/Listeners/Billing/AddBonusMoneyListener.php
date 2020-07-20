<?php


namespace App\Listeners\Billing;


use App\Events\Billing\AddBonusMoneyEvent;
use Illuminate\Support\Facades\DB;

class AddBonusMoneyListener extends AbstractBillingTransactionListener
{
    public function handle(AddBonusMoneyEvent $event)
    {
        DB::transaction(function () use ($event) {
            $this->handleBillingTransaction($event);

            $event->getWallets()->increment('amount', $event->getAmount());
        });
    }
}
