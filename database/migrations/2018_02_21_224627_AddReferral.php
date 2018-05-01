<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $t) {
            $t->integer('referred_by')->nullable();
        });
        Schema::create('user_referrals', function(Blueprint $t) {
            $t->increments('id');
            $t->integer('referred_user_id');
            $t->integer('referred_by_user_id');
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
