<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicsRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphics_requests', function(Blueprint $t) {

            $t->increments('id');
            $t->integer('user_id');
            $t->integer('type');
            $t->text('skype');
            $t->longText('extra_details');
            $t->integer('status')->default(0);
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
