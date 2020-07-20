<?php


namespace App\Console\Billing;


use App\Console\Command;
use App\Entity\Models\Users\User;
use App\Entity\Providers\Billing\WalletsProvider;

class CreateWalletsForUsersIfExists extends Command
{
    protected $signature = 'billing:wallets-create {user_id?}';

    protected $description = 'Create billing wallets for user if mot exists';

    public function handle()
    {
        $userId = $this->argument('user_id');
        try {
            if ($userId) {
                $user = User::query()->find($userId);

                if (!$user) {
                    $this->error('User id: '. $userId . ' is not found');
                    return;
                }

                WalletsProvider::createWalletsForUser($user);
            } else {
                $users = User::doesntHave('wallets')->get();

                if ($users->isEmpty()) {
                    $this->info('Nothing to updated');
                    return;
                }

                foreach ($users as $user) {
                    WalletsProvider::createWalletsForUser($user);
                }
            }

            $this->info('User wallets has been successfully updated');
        } catch (\LogicException $e) {
            $this->warn($e->getMessage());
        }
    }
}
