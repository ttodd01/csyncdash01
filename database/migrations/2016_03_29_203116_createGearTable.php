<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_list', function(Blueprint $t) {
            $t->increments('id');
            $t->string('title');
            $t->text('link');
            $t->text('picture');
            $t->longText('description');
            $t->integer('category_id');
            $t->timestamps();

        });
        Schema::create('gear_categories', function(Blueprint $t) {
            $t->increments('id');
            $t->string('name');
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
