<?php


namespace App\Services\Billing\Wallets;


use App\Services\Billing\Wallets\Actions\ActionsInterface;
use Illuminate\Database\Eloquent\Collection;

class WalletsServices
{
    public function setPossibleActions(Collection $wallets, array $possibleActions): Collection
    {
        return $wallets->map(function ($wallet) use ($possibleActions) {
            $wallet->action = $possibleActions[$wallet->type]::NAME_ACTION;
            return $wallet;
        });
    }

    public function getPossibleAction(string $action)
    {
        return ActionsInterface::ACTIONS_MAPPING[$action];
    }

    public function runAction(ActionsInterface $action)
    {
        return $action->run();
    }
}
