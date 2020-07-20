<?php


namespace App\Listeners\Billing;


use App\Entity\Models\Billing\Transactions;
use App\Events\Billing\AbstractBillingTransactionEvent;

abstract class AbstractBillingTransactionListener
{
    protected function handleBillingTransaction(AbstractBillingTransactionEvent $event)
    {
        $transaction = new Transactions();
        $transaction->wallet_id = $event->getWallets()->id;
        $transaction->billing_transactions_type = $event->getTransactionType();
        $transaction->balance_before = $event->getWallets()->amount;
        $transaction->comment = $event->getComment();
        $transaction->save();
    }
}
