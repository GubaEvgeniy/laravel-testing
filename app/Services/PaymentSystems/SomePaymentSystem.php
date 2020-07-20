<?php


namespace App\Services\PaymentSystems;


use App\Entity\Models\Users\User;

class SomePaymentSystem
{
    public function paymentTransfer(User $user, $amount)
    {
        //Send request to bank
    }
}
