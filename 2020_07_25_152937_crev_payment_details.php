<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrevPaymentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crev_payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('pay_ref_no')->nullable();
            $table->double('pay_amount', 10, 2)->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_cvv_no')->nullable();
            $table->string('card_exp_date')->nullable();
            $table->string('payment_mode')->nullable();
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
        Schema::dropIfExists('crev_payment_details');
    }
}
