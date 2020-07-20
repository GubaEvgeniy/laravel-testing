<?php


namespace App\Services\Billing\Wallets\Actions;


use App\Services\Billing\Wallets\Actions\BonusMoney\ConvertToRealMoney;
use App\Services\Billing\Wallets\Actions\RealMoney\Withdrawal;

interface ActionsInterface
{
    const ACTIONS_MAPPING = [
        Withdrawal::NAME_ACTION => Withdrawal::class,
        ConvertToRealMoney::NAME_ACTION => ConvertToRealMoney::class
    ];

    public function run();
}
