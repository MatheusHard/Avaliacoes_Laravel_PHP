<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
          
            $table->increments('id');
            $table->tinyInteger('radioSim_1');
            $table->tinyInteger('radioNao_1');

            $table->tinyInteger('radioMuito_2');
            $table->tinyInteger('radiobom_2');
            $table->tinyInteger('radioRegular_2');
            $table->tinyInteger('radioRuim_2');
            
            $table->tinyInteger('radioSeguro_3');
            $table->tinyInteger('radioPoucoSeguro_3');
            $table->tinyInteger('radioInseguro_3');

            $table->tinyInteger('radioExcessiva_4');
            $table->tinyInteger('radioRazoavel_4');
            $table->tinyInteger('radioInsuficiente_4');
            
            $table->tinyInteger('radioMuito_5');
            $table->tinyInteger('radiobom_5');
            $table->tinyInteger('radioRegular_5');
            $table->tinyInteger('radioRuim_5');

            $table->tinyInteger('radioMuito_6');
            $table->tinyInteger('radiobom_6');
            $table->tinyInteger('radioRegular_6');
            $table->tinyInteger('radioRuim_6');

            $table->tinyInteger('radioMuito_7');
            $table->tinyInteger('radiobom_7');
            $table->tinyInteger('radioRegular_7');
            $table->tinyInteger('radioRuim_7');

            $table->tinyInteger('radioMuito_8');
            $table->tinyInteger('radiobom_8');
            $table->tinyInteger('radioRegular_8');
            $table->tinyInteger('radioRuim_8');

            $table->tinyInteger('radioMuito_9');
            $table->tinyInteger('radiobom_9');
            $table->tinyInteger('radioRegular_9');
            $table->tinyInteger('radioRuim_9');
            
            $table->tinyInteger('radioMuito_10');
            $table->tinyInteger('radiobom_10');
            $table->tinyInteger('radioRegular_10');
            $table->tinyInteger('radioRuim_10');

            $table->string('descricao', 100)->nullable();
            $table->string('cpf_agente', 11)->unique();
            $table->string('nome_agente', 250);
            $table->tinyInteger('tipo_agente');
            $table->tinyInteger('id_cidade');
            $table->timestamp('datahora');
            
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
        Schema::dropIfExists('avaliacoes');
    }
}
