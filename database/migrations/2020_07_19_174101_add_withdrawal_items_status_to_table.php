<?php

use App\Entity\Models\WithdrawalItems\WithdrawalItemsStatus;
use Illuminate\Database\Migrations\Migration;

class AddWithdrawalItemsStatusToTable extends Migration
{
    const TYPES_MAPPING = [
        [
            'status_name' => WithdrawalItemsStatus::STATUS_COMPLETED,
            'status_desc' => 'Withdrawal item is completed'
        ],
        [
            'status_name' => WithdrawalItemsStatus::STATUS_DECLINED,
            'status_desc' => 'Withdrawal item is declined'
        ],
        [
            'status_name' => WithdrawalItemsStatus::STATUS_IN_PROGRESS,
            'status_desc' => 'Withdrawal item in progress'
        ],
        [
            'status_name' => WithdrawalItemsStatus::STATUS_OPEN,
            'status_desc' => 'Withdrawal item is open'
        ]
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (self::TYPES_MAPPING as $type) {
            WithdrawalItemsStatus::query()->updateOrCreate(
                ['status' => $type['status_name']],
                ['description' => $type['status_desc']]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (self::TYPES_MAPPING as $type) {
            WithdrawalItemsStatus::query()->whereStatus($type['status_name'])->delete();
        }
    }
}
