<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrevCartDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crev_cart_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retaurant_id')->nullable();
            $table->integer('food_item_id')->nullable();
            $table->integer('item_quantity')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('session_id')->nullable();
            $table->double('item_amount', 8, 2)->nullable();
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
        Schema::dropIfExists('crev_cart_details');
    }
}
