<?php


namespace App\Listeners\Billing;


use Illuminate\Support\Facades\DB;


class AddMoneyListener extends AbstractBillingTransactionListener
{
    public function handle($event)
    {
        DB::transaction(function () use ($event) {
            $this->handleBillingTransaction($event);

            $event->getWallets()->increment('amount', $event->getAmount());
        });
    }
}
