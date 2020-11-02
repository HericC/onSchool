<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
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

            $table->string('titulo');
            $table->string('descricao');
            $table->dateTime('entrega');
            $table->tinyInteger('tipoConteudo')->default(1);
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
        Schema::dropIfExists('atividades');
    }
}
