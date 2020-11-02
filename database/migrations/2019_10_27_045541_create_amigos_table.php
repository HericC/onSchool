<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('my_id')
                ->foreign('my_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('friend_id')
                ->foreign('friend_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('amigos');
    }
}
