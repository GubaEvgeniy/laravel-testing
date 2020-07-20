<?php

use App\Services\Benefits\BenefitsType\Money\BonusMoney;
use App\Services\Benefits\BenefitsType\Items\RealItem;
use App\Services\Benefits\BenefitsType\Money\RealMoney;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', [RealMoney::TYPE, RealItem::TYPE, BonusMoney::TYPE]);
            $table->jsonb('data');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefits');
    }
}
