<?php


namespace App\Http\Controllers\Cabinet\Billing;


use App\Entity\Models\Billing\Wallets;
use App\Entity\Models\Users\User;
use App\Entity\Providers\Billing\WalletsProvider;
use App\Exceptions\Billing\LowBalanceException;
use App\Http\Controllers\Controller;
use App\Http\Request\Billing\Wallets\WalletsActionRequest;
use App\Services\Billing\Wallets\Actions\BonusMoney\ConvertToRealMoney;
use App\Services\Billing\Wallets\Actions\RealMoney\Withdrawal;
use App\Services\Billing\Wallets\WalletsServices;

class WalletsController extends Controller
{
    public function show(WalletsServices $walletsServices)
    {
        /** @var User $user */
        $user = \Auth::user();

        $wallets = WalletsProvider::getAllWalletsByUser($user);

        $possibleActions = [
            Wallets::TYPE_REAL_MONEY => Withdrawal::class,
            Wallets::TYPE_BONUS_MONEY => ConvertToRealMoney::class
        ];
        $wallets = $walletsServices->setPossibleActions($wallets, $possibleActions);

        return view('cabinet.billing.wallets.index', [
            'wallets' => $wallets
        ]);
    }

    public function action(WalletsActionRequest $request, WalletsServices $walletsServices)
    {
        /** @var User $user */
        $walletAction = $request->getWalletAction();

        $action = $walletsServices->getPossibleAction($walletAction);

        $data = [
            'amount' => $request->getAmount(),
            'user' => \Auth::user()
        ];

        try {
            $messageResult = $walletsServices->runAction(new $action($data));
            return redirect()->route('cabinet.billing.wallets.show')->with('success', $messageResult);
        } catch (LowBalanceException $e) {
            return redirect()->route('cabinet.billing.wallets.show')->with('error', $e->getMessage());
        }

    }
}
