<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('vehiclePlate', 7);
            $table->dateTime('entryDateTime');
            $table->dateTime('exitDateTime')->default('0001-01-01 00:00:00');
            $table->string('priceType')->nullable();
            $table->decimal('price', 12, 2)->default(0.00);
            $table->unsignedInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
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
        Schema::dropIfExists('service_orders');
    }
}
