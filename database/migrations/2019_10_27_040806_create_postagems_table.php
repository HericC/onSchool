<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('turma_id')
                ->foreign('turma_id')
                ->reference('id')
                ->on('turmas')
                ->onDelete('cascade');

            $table->unsignedBigInteger('autor_id')
                ->foreign('autor_id')
                ->reference('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('descricao');
            $table->tinyInteger('tipoConteudo')->default(0);
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
        Schema::dropIfExists('postagems');
    }
}
