<?php


namespace App\Listeners\Billing;


use App\Exceptions\Billing\LowBalanceException;
use Illuminate\Support\Facades\DB;

class ChargeMoneyListener extends AbstractBillingTransactionListener
{
    public function handle($event)
    {
        DB::transaction(function () use ($event) {
            if ($event->getWallets()->amount < $event->getAmount()) {
                throw new LowBalanceException($event->getWallets());
            }

            $this->handleBillingTransaction($event);

            $event->getWallets()->decrement('amount', $event->getAmount());
        });
    }
}
