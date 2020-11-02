<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentsPostagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coments_postagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('postagem_id')
                ->foreign('postagem_id')
                ->reference('id')
                ->on('postagems')
                ->onDelete('cascade');

            $table->unsignedBigInteger('autor_id')
                ->foreign('autor_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('descricao');
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
        Schema::dropIfExists('coments_postagems');
    }
}
