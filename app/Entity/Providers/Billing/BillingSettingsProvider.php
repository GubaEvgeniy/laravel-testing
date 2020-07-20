<?php


namespace App\Entity\Providers\Billing;


use App\Entity\Models\Billing\BillingSettings;

class BillingSettingsProvider
{
    public static function getSettingsByKeyName(string $key): BillingSettings
    {
        return BillingSettings::query()->where('key', '=', $key)->first();
    }
}
