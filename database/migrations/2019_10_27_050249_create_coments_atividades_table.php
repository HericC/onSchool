<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentsAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coments_atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id')
                ->foreign('atividade_id')
                ->reference('id')
                ->on('atividades')
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
        Schema::dropIfExists('coments_atividades');
    }
}
