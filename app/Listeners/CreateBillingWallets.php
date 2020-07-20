<?php


namespace App\Listeners;


use App\Entity\Models\Users\User;
use App\Entity\Providers\Billing\WalletsProvider;
use Illuminate\Auth\Events\Registered;

class CreateBillingWallets
{
    public function handle(Registered $event)
    {
        if ($event->user instanceof User) {
            WalletsProvider::createWalletsForUser($event->user);
        } else {
            throw new \LogicException('User is not a user entity');
        }
    }
}
