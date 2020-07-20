<?php


namespace App\Exceptions\Billing;

use Throwable;

class WrongTypeWalletsException extends BillingException
{
    public function __construct(
        string $expectedType,
        string $actualType,
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        $messageError = sprintf(
            'Wrong wallet type. Expected: %d, actual %d',
            $expectedType,
            $actualType
        );

        if ($message) {
            $messageError .= '. ' . $message;
        }

        parent::__construct($messageError . $message, $code, $previous);
    }
}
