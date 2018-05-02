<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('full_name');
            $table->string('paypal_email');
            $table->string('password', 60);
            $table->string('rev_share')->default(70);
            $table->text('skype')->nullable();
            $table->text('address')->nullable();
            $table->longText('bio')->nullable();
            $table->string('country')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('birth_day')->nullable();
            $table->integer('birth_month')->nullable();
            $table->integer('birth_year')->nullable();
            $table->string('dailymotion');

            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            [
                'username' => 'ttodd',
                'email' => 'tim@creatorsync.com',
                'full_name' => 'Tim Todd',
                'paypal' => 'tim@creatorsync.com',
                'password' => '$10$GQL2UOSgvRKzD0SPvKD27O.hy240jwO8/AFKpA30OF7k51SM7faBm',
                'rev_share' => '70',
                'rank' => '4',
                'head_network' => '1',
                'dailymotion' => 'yosoftuk',


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
        Schema::drop('users');
    }
}
