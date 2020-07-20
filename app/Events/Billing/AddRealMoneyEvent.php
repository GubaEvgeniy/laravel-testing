<?php


namespace App\Events\Billing;


use App\Entity\Models\Billing\TransactionsTypes;
use App\Entity\Models\Billing\Wallets;
use App\Exceptions\Billing\WrongTypeWalletsException;

class AddRealMoneyEvent extends AbstractBillingTransactionEvent
{
    public function __construct(Wallets $wallets, $amount, string $comment = '')
    {
        if ($wallets->type !== Wallets::TYPE_REAL_MONEY) {
            throw new WrongTypeWalletsException(Wallets::TYPE_REAL_MONEY, $wallets->type);
        }

        parent::__construct($wallets, $amount, $comment);
    }

    public function getTransactionType(): string
    {
        return TransactionsTypes::TYPE_ADD;
    }
}
