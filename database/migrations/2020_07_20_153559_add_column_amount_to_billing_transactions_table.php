<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAmountToBillingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidamount
     */
    public function up()
    {
        Schema::table('billing_transactions', function (Blueprint $table) {
            $table->float('amount', 13, 4)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billing_transactions', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
}
