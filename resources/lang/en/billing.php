<?php

use App\Entity\Models\Billing\Wallets;

return [
    'wallets' => [
        'actions' => [
            Wallets::TYPE_BONUS_MONEY => [
                'button' => 'Convert',
                'desc' => 'Convert to real money'
            ],
            Wallets::TYPE_REAL_MONEY => [
                'button' => 'Withdrawal',
                'desc' => 'Withdrawal money'
            ]
        ]
    ]
];
