<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Networksettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_network', function(Blueprint $t) {
            $t->increments('id')->unsigned();
            $t->string('name');
            $t->string('slogan')->nullable();
            $t->string('logo_url')->nullable();
            $t->string('background_image_url')->nullable();
            $t->integer('head_network')->unsigned();
            $t->boolean('sub_network');
            $t->timestamps();
            $t->longText('network_bio')->nullable();
            $t->string('twitter')->nullable();
            $t->string('facebook')->nullable();
            $t->string('youtube')->nullable();
            $t->string('instagram')->nullable();
            $t->string('user_id')->nullable();
            $t->string('support_url')->nullable();
            $t->string('business_name')->nullable();
            $t->string('telephone_number')->nullable();
            $t->string('email_address')->nullable();

        });


        DB::table('user_network')->insert([
            [
                'name' => 'CreatorSync',
                'slogan' => 'DailyMotion Partnership Network',
                'head_network' => '1',
                'sub_network' => '1',
'user_id' => '1',
            ],

        ]);
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
