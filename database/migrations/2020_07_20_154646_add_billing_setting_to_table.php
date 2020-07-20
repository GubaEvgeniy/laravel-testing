<?php

use App\Entity\Models\Billing\BillingSettings;
use Illuminate\Database\Migrations\Migration;

class AddBillingSettingToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        BillingSettings::query()->updateOrCreate(
            ['key' => BillingSettings::CONVERSION_FEE],
            ['value' => 0.8, 'description' => 'Rate of conversion bonus money to real money']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
