<?php


namespace App\Services\Billing\Wallets\Actions\RealMoney;


use App\Entity\Models\Billing\Wallets;
use App\Entity\Models\Users\User;
use App\Entity\Providers\Billing\WalletsProvider;
use App\Events\Billing\WithdrawalRealMoneyEvent;
use App\Services\Billing\Wallets\Actions\ActionsInterface;
use App\Services\PaymentSystems\SomePaymentSystem;

class Withdrawal implements ActionsInterface
{
    const NAME_ACTION = 'withdrawal';

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

    public function run(): string
    {
        $wallet = WalletsProvider::getWalletByTypeForUser($this->user, Wallets::TYPE_REAL_MONEY);

        event(
            new WithdrawalRealMoneyEvent($wallet, $this->amount, 'withdrawal real money')
        );

        $paymentSystem = new SomePaymentSystem();
        $paymentSystem->paymentTransfer($this->user, $this->amount);

        return 'withdrawal request successfully sent';
    }
}
