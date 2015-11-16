<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('wishlist_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('wishlist_id');
            $table->integer('claimed_by_user_id', null)->nullable();
            $table->string('name');
            $table->string('url')->nullable();
            $table->integer('cost')->nullable();
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
        \Schema::drop('wishlist_items');
    }
}
