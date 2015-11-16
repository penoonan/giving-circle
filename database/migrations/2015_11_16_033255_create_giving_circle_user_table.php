<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivingCircleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('giving_circle_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('giving_circle_id');
            $table->string('user_id');
            $table->string('user_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::drop('giving_circle_user');
    }
}
