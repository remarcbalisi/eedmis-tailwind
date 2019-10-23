<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarketStorePaymentIdInBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('market_billings', function (Blueprint $table) {
            $table->unsignedBigInteger('market_store_payment_id');

            $table->foreign('market_store_payment_id')->references('id')->on('market_store_payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('market_billings', function (Blueprint $table) {
            $table->dropForeign(['market_store_payment_id']);
            $table->dropColumn('market_store_payment_id');
        });
    }
}
