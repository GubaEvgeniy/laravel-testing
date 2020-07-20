<?php


namespace App\Exceptions\Billing;


use App\Entity\Models\Billing\Wallets;
use Throwable;

class LowBalanceException extends BillingException
{
    public function __construct(
        Wallets $wallets,
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        $messageError = sprintf(
            'Your wallet have low balance'
        );

        $messageError .= '. ' . $message;

        parent::__construct($messageError . $message, $code, $previous);
    }
}
