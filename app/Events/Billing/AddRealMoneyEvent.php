<?php


namespace App\Events\Billing;


use App\Entity\Models\Billing\Wallets;
use App\Events\Event;
use App\Exceptions\Billing\WrongTypeWalletsException;

class AddRealMoneyEvent extends Event
{
    /**
     * @var Wallets
     */
    private Wallets $wallets;
    private $amount;

    public function __construct(Wallets $wallets, $amount)
    {
        if ($wallets->type !== Wallets::TYPE_REAL_MONEY) {
            throw new WrongTypeWalletsException(Wallets::TYPE_REAL_MONEY, $wallets->type);
        }

        $this->wallets = $wallets;
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return Wallets
     */
    public function getWallets(): Wallets
    {
        return $this->wallets;
    }
}
