<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function(Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id');
            $t->string('earning_month');
            $t->string('payment_month');
            $t->string('gross_amount');
            $t->string('net_amount');
            $t->string('network_share');
            $t->string('status');
            $t->string('method');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
