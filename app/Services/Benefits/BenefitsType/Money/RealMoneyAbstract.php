<?php


namespace App\Services\Benefits\BenefitsType\Money;


use App\Entity\Models\Benefits\UsersBenefits;
use App\Entity\Models\Billing\Wallets;
use App\Entity\Providers\Billing\WalletsProvider;
use App\Events\Billing\AddRealMoneyEvent;

class RealMoneyAbstract extends MoneyBenefitsAbstract
{
    const TYPE = 'real_money';

    public function add(UsersBenefits $usersBenefits)
    {
        $wallet = WalletsProvider::getWalletByTypeForUser($usersBenefits->user, Wallets::TYPE_REAL_MONEY);

        event(new AddRealMoneyEvent($wallet, $usersBenefits->result));
    }
}
