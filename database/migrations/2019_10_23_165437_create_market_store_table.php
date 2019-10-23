<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('market_department_id');
            $table->unsignedBigInteger('stall_id');

            $table->foreign('tenant_id')->references('id')->on('users');
            $table->foreign('market_department_id')->references('id')->on('market_departments');
            $table->foreign('stall_id')->references('id')->on('market_stalls');
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
        Schema::dropIfExists('market_stores');
    }
}
