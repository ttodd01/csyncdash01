<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_courses', function(Blueprint $t) {

            $t->increments('id');
            $t->integer('rank_needed');
            $t->string('title');
            $t->longText('description');
            $t->timestamps();

        });

        Schema::create('academy_lessons', function(Blueprint $t) {
            $t->increments('id');
            $t->integer('course_id');
            $t->string('title');
            $t->longText('course_text');
            $t->timestamps();
        });

        Schema::create('academy_lessons_videos', function(Blueprint $t) {

            $t->increments('id');
            $t->string('video_id');
            $t->integer('lesson_id');
            
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
