<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacotes', function (Blueprint $table) {
            $table->id();
            $table->char('nome', 80);
            $table->decimal('valor', 10,2);
            $table->date('dataInicio')->nullable();
            $table->date('dataFim')->nullable();
            $table->text('descricao')->nullable();
            $table->char('urlImagem', 150)->nullable();
            $table->char('telefone', 45)->nullable();
            $table->char('site', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacotes');
    }
}
