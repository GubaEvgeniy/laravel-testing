<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('wallet_id');
            $table->string('billing_transactions_type');
            $table->string('comment');
            $table->float('balance_before', 13, 4);
            $table->timestamps();

            $table->foreign('wallet_id')
                ->references('id')
                ->on('billing_wallets')
                ->onDelete('cascade');

            $table->foreign('billing_transactions_type')
                ->references('type')
                ->on('billing_transactions_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_transactions');
    }
}
