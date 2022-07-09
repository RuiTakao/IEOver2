<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_user_id');
            $table->unsignedBigInteger('post_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('post_user_id')
                ->references('id')
                ->on('users');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts');
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
        Schema::dropIfExists('message_rooms');
    }
}
