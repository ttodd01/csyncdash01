<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_id', function(Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id');
            $t->string('stolen_vid_url');
            $t->string('proof_1');
            $t->string('proof_2');
            $t->string('actions');
            $t->boolean('completed')->default(0);

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
