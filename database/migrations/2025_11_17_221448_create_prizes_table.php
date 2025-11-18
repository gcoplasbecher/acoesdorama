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
        Schema::create('prizes', function (Blueprint $table) {
            $table->id(); // ID único do prêmio
            $table->foreignId('campaign_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para campanha
            $table->string('name'); // Nome do prêmio (ex: "Moto Honda", "Prêmio em Dinheiro")
            $table->text('description'); // Descrição detalhada do prêmio
            $table->string('type'); // Tipo: 'main' (principal) ou 'secondary' (secundário)
            $table->string('prize_type'); // Tipo do prêmio: 'cash' (dinheiro), 'product' (produto), 'trip' (viagem), etc
            $table->decimal('cash_value', 10, 2)->nullable(); // Valor em R$ para prêmios em dinheiro
            $table->integer('winning_number')->nullable(); // Número sorteado que ganhou este prêmio
            $table->integer('position')->default(0); // Ordem de exibição dos prêmios
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prizes');
    }
};
