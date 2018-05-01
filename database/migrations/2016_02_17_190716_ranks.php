<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ranks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ranks', function(Blueprint $t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->string('slug');
            $t->string('name');
            $t->timestamps();
        });

        DB::table('user_ranks')->insert([
            [
                'name' => 'Pending',
                'slug' => 'pending',

            ],
            [
                'name' => 'Partner',
                'slug' => 'partner',

            ],
            [
                'name' => 'Network',
                'slug' => 'network',

            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',

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
