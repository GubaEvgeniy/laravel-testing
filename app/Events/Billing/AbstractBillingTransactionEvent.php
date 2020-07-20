<?php


namespace App\Events\Billing;


use App\Entity\Models\Billing\Wallets;
use App\Events\Event;

abstract class AbstractBillingTransactionEvent extends Event
{
    /**
     * @var Wallets
     */
    private Wallets $wallets;
    private $amount;
    private string $comment;

    public function __construct(Wallets $wallets, $amount, string $comment = '')
    {
        $this->wallets = $wallets;
        $this->amount = $amount;
        $this->comment = $comment;
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

    public abstract function getTransactionType(): string ;

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }
}
