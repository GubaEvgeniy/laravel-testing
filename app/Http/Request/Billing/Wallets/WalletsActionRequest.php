<?php


namespace App\Http\Request\Billing\Wallets;


use App\Http\Request\BaseWebRequest;
use App\Services\Billing\Wallets\Actions\BonusMoney\ConvertToRealMoney;
use App\Services\Billing\Wallets\Actions\RealMoney\Withdrawal;

class WalletsActionRequest extends BaseWebRequest
{
    public function rules()
    {
        return [
            'amount' => 'required|numeric',
            'wallet_type' => 'required|string|exists:billing_wallets,type',
            'wallet_action' => 'required|string|in:' . Withdrawal::NAME_ACTION . ',' . ConvertToRealMoney::NAME_ACTION
        ];
    }

    public function getAmount()
    {
        return $this->request->get('amount');
    }

    public function getWalletType()
    {
        return $this->request->get('wallet_type');
    }

    public function getWalletAction()
    {
        return $this->request->get('wallet_action');
    }
}
