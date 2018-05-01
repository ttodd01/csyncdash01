<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('has_connected_channel')->default(0);

        });
        Schema::create(\Config::get('youtubeconfig.table_name'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('access_token');
            $table->timestamps();
        });
        Schema::create('youtube_channels', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id');
            $t->string('channel_id');
            $t->string('username')->nullable();
            $t->longText('description')->nullable();
            $t->string('thumbnail')->nullable();
            $t->string('banner')->nullable();
            $t->integer('views')->unsigned();
            $t->integer('subscribers')->unsigned();
            $t->integer('videos')->unsigned();
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
