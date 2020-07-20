<?php


namespace App\Services\Benefits\BenefitsType\Money;


use App\Entity\Models\Benefits\UsersBenefits;
use App\Entity\Models\Billing\Wallets;
use App\Entity\Providers\Billing\WalletsProvider;
use App\Events\Billing\AddBonusMoneyEvent;

class BonusMoney extends MoneyBenefitsAbstract
{
    const TYPE = 'bonus_money';

    public function add(UsersBenefits $usersBenefits)
    {
        $wallet = WalletsProvider::getWalletByTypeForUser($usersBenefits->user, Wallets::TYPE_BONUS_MONEY);

        event(new AddBonusMoneyEvent($wallet, $usersBenefits->result));

        $usersBenefits->used = true;
        $usersBenefits->save();
    }
}
