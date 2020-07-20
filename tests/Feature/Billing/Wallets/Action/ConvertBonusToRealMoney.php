<?php


namespace Tests\Feature\Billing\Wallets\Action;


use App\Entity\Models\Billing\BillingSettings;
use App\Entity\Models\Billing\Wallets;
use App\Entity\Models\Users\User;
use App\Entity\Providers\Billing\BillingSettingsProvider;
use App\Entity\Providers\Billing\WalletsProvider;
use App\Services\Billing\Wallets\Actions\BonusMoney\ConvertToRealMoney;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ConvertBonusToRealMoney extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function convertBalanceRealToBonus()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $bonusAmount = 100;

        factory(Wallets::class)->state(Wallets::TYPE_REAL_MONEY)->create([
            'user_id' => $user->id,
            'amount' => 0
        ]);

        factory(Wallets::class)->state(Wallets::TYPE_BONUS_MONEY)->create([
            'user_id' => $user->id,
            'amount' => $bonusAmount
        ]);

        $data = [
            'user' => $user,
            'amount' => $bonusAmount
        ];
        (new ConvertToRealMoney($data))->run();

        $convertFee = BillingSettingsProvider::getSettingsByKeyName(BillingSettings::CONVERSION_FEE)->value;

        $expectedAmount = $bonusAmount * $convertFee;
        $actualAmount = WalletsProvider::getWalletByTypeForUser($user, Wallets::TYPE_REAL_MONEY)->amount;

        $this->assertEquals($expectedAmount, $actualAmount);
    }
}
