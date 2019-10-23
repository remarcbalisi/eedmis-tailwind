<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketStorePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_store_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('market_store_id');
            $table->unsignedBigInteger('market_payment_id');
            $table->string('month');
            $table->string('status')->default('paid'); //partial

            $table->foreign('market_store_id')->references('id')->on('market_stores');
            $table->foreign('market_payment_id')->references('id')->on('market_payments');
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
        Schema::dropIfExists('market_store_payments');
    }
}
