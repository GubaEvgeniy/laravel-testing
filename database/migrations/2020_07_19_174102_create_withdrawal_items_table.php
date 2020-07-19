<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->unsignedBigInteger('receiver_id')->comment('Receiver of the al item');
            $table->string('comment')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('receiver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('status')
                ->references('status')
                ->on('withdrawal_items_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawal_items');
    }
}
