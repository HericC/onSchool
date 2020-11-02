<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes_turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('my_id')
            ->foreign('my_id')
            ->reference('id')
            ->on('users')
            ->onDelete('cascade');
        $table->unsignedBigInteger('turma_id')
            ->foreign('turma_id')
            ->reference('id')
            ->on('turmas')
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
        Schema::dropIfExists('participantes_turmas');
    }
}
