<?php

use App\Entity\Models\Billing\TransactionsTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillingTransactionsTypesToTable extends Migration
{
    const TYPES_MAPPING = [
        [
            'type_name' => TransactionsTypes::TYPE_ADD,
            'type_desc' => 'Transaction add balance'
        ],
        [
            'type_name' => TransactionsTypes::TYPE_CHARGE,
            'type_desc' => 'Transaction charge balance'
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
            TransactionsTypes::query()->updateOrCreate(
                ['type' => $type['type_name']],
                ['description' => $type['type_desc']]
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
            TransactionsTypes::query()->whereType($type['type_name'])->delete();
        }
    }
}
