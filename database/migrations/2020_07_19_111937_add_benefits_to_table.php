<?php

use App\Entity\Models\Benefits\Benefits;
use App\Services\Benefits\BenefitsType\Money\BonusMoney;
use App\Services\Benefits\BenefitsType\Items\RealItem;
use App\Services\Benefits\BenefitsType\Money\RealMoney;
use Illuminate\Database\Migrations\Migration;

class AddBenefitsToTable extends Migration
{
    const BENEFITS = [
        [
            'type' => RealMoney::TYPE,
            'data' => [
                'min_range' => 0,
                'max_range' => 100
            ],
            'active' => true
        ],
        [
            'type' => BonusMoney::TYPE,
            'data' => [
                'min_range' => 0,
                'max_range' => 100
            ],
            'active' => true
        ],
        [
            'type' => RealItem::TYPE,
            'data' => [
                'items' => [
                    'item1',
                    'item2',
                    'item3',
                ]
            ],
            'active' => true
        ]
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (self::BENEFITS as $benefit) {
            Benefits::updateOrCreate(
                ['type' => $benefit['type']],
                ['active' => $benefit['active'], 'data' => $benefit['data']]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function down()
    {
        foreach (self::BENEFITS as $benefit) {
            Benefits::whereType($benefit['type'])->delete();
        }
    }
}
