<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfferZoneFlagAndDiscPercentAndOrderAmountToRestoname extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restoname', function (Blueprint $table) {
            $table->string('offer_zone_flag')->nullable();
            $table->integer('disc_percent')->nullable();
            $table->double('order_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restoname', function (Blueprint $table) {
            $table->dropColumn(['offer_zone_flag',  'disc_percent', 'order_amount']);
        });
    }
}
