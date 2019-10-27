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
            $table->longText('address')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('market_department_id')->nullable();
            $table->unsignedBigInteger('stall_id')->nullable();

            $table->foreign('tenant_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('market_department_id')->references('id')->on('market_departments')->onDelete('set null');
            $table->foreign('stall_id')->references('id')->on('market_stalls')->onDelete('set null');
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
