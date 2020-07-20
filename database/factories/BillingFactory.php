<?php

/** @var Factory $factory */

use App\Entity\Models\Billing\Wallets;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Wallets::class, function () {
    return [
        'type' => Wallets::TYPE_REAL_MONEY,
        'amount' => 0,
    ];
});

$factory->state(Wallets::class, Wallets::TYPE_REAL_MONEY, function () {
    return [
        'type' => Wallets::TYPE_REAL_MONEY,
        'amount' => 0,
    ];
});
$factory->state(Wallets::class, Wallets::TYPE_BONUS_MONEY, function () {
    return [
        'type' => Wallets::TYPE_BONUS_MONEY,
        'amount' => 0,
    ];
});
