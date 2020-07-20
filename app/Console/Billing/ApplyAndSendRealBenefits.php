<?php


namespace App\Console\Billing;


use App\Console\Command;
use App\Entity\Providers\Benefits\UsersBenefitsProvider;
use App\Services\Benefits\BenefitsType\Money\RealMoney;
use App\Services\Billing\Wallets\Actions\RealMoney\Withdrawal;

class ApplyAndSendRealBenefits extends Command
{
    protected $signature = 'billing:send-real-benefits {user_id?}';

    protected $description = 'Send all real unused benefits for all users';

    public function handle()
    {
        $userBenefits = UsersBenefitsProvider::getUnusedBenefitsByType(RealMoney::TYPE);

        if ($userBenefits->isNotEmpty()) {
            foreach ($userBenefits as $benefit) {
                (new RealMoney())->add($benefit);

                $data = [
                    'user' => $benefit->user,
                    'amount' => $benefit->result
                ];
                (new Withdrawal($data))->run();
            }

            $this->info('All benefits has been sending');
        } else {
            $this->info('Nothing to send');
        }
    }
}
