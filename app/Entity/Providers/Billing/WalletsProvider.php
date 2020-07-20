<?php


namespace App\Entity\Providers\Billing;


use App\Entity\Models\Billing\Wallets;
use App\Entity\Models\Users\User;
use LogicException;

class WalletsProvider
{
    /**
     * @param User $user
     * @throws LogicException
     */
    public static function createWalletsForUser(User $user): void
    {
        $userWallets = Wallets::query()->whereUserId($user->id)->get();

        if ($userWallets->isEmpty()) {
            $walletsTypes = [Wallets::TYPE_BONUS_MONEY, Wallets::TYPE_REAL_MONEY];

            foreach ($walletsTypes as $walletsType) {
                $wallet = new Wallets();
                $wallet->user_id = $user->id;
                $wallet->type = $walletsType;
                $wallet->amount = 0;

                $wallet->save();
            }
        } else {
            throw new LogicException('Billing wallets is already exists');
        }
    }

    /**
     * @param User $user
     * @param string $type
     * @return Wallets
     */
    public static function getWalletByTypeForUser(User $user, string $type): Wallets
    {
        return Wallets::query()->whereType($type)->whereUserId($user->id)->first();
    }
}
