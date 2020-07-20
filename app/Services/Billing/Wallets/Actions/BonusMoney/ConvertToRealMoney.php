<?php


namespace App\Services\Billing\Wallets\Actions\BonusMoney;


use App\Entity\Models\Billing\BillingSettings;
use App\Entity\Models\Billing\Wallets;
use App\Entity\Models\Users\User;
use App\Entity\Providers\Billing\BillingSettingsProvider;
use App\Entity\Providers\Billing\WalletsProvider;
use App\Events\Billing\AddRealMoneyEvent;
use App\Events\Billing\ChargeBonusMoneyEvent;
use App\Services\Billing\Wallets\Actions\ActionsInterface;

class ConvertToRealMoney implements ActionsInterface
{
    const NAME_ACTION = 'convert';

    /**
     * @var User
     */
    private $user;

    /**
     * @var float
     */
    private $amount;

    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->amount = $data['amount'];
    }

    public function run()
    {
        $walletBonus = WalletsProvider::getWalletByTypeForUser($this->user, Wallets::TYPE_BONUS_MONEY);
        $walletReal = WalletsProvider::getWalletByTypeForUser($this->user, Wallets::TYPE_REAL_MONEY);

        $amountChargeBonusMoney = $this->amount;
        $convertFee = BillingSettingsProvider::getSettingsByKeyName(BillingSettings::CONVERSION_FEE)->value;

        $amountAddRealMoney = $this->amount * $convertFee;

        event(
            new ChargeBonusMoneyEvent($walletBonus, $this->amount, 'convert bonus money to real')
        );
        event(
            new AddRealMoneyEvent($walletReal, $amountAddRealMoney, 'convert bonus money to real')
        );

        return sprintf(
            'You made an exchange %s bonus money for %s real money',
            $amountChargeBonusMoney,
            $amountAddRealMoney
        );
    }
}
