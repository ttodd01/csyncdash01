<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MusicTracks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_tracks', function(Blueprint $t) {
            $t->increments('id')->unsigned();
            $t->string('name');
            $t->string('artist')->nullable();
            $t->string('download_url')->nullable();
            $t->string('artist_img')->nullable();



            $t->string('copyright_info')->nullable();
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
