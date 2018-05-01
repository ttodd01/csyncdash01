<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function(Blueprint $t) {
            $t->increments('id');
            $t->string('title');
            $t->text('small_description');
            $t->boolean('links_out')->default(false);
            $t->longText('text');
            $t->string('link');
            $t->string('image_url');
            $t->string('tag');
            $t->integer('type');
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
