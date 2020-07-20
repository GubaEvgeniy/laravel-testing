<?php


namespace App\Events\Billing;


use App\Entity\Models\Billing\TransactionsTypes;
use App\Entity\Models\Billing\Wallets;

class ChargeBonusMoneyEvent extends AbstractBillingTransactionEvent
{
    public function __construct(Wallets $wallets, $amount, string $comment = '')
    {
        parent::__construct($wallets, $amount, $comment);
    }

    public function getTransactionType(): string
    {
        return TransactionsTypes::TYPE_CHARGE;
    }
}
