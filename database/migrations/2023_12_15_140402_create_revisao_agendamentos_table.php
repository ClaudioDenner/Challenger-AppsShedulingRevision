<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('revisao_agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('veiculo_id');
            $table->date('data_agendamento');
            $table->text('descricao');
            $table->float('valor');
            $table->timestamps();

            //relacionamento com tabela clientes
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            
            //relacionamento com tabela veiculos
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisao_agendamentos');
    }
};
