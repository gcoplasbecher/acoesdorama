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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id(); // ID único e auto-incremento da campanha
            $table->string('name'); // Nome da campanha (ex: "Sorteio de Moto Honda")
            $table->text('description'); // Descrição detalhada da campanha e regras
            $table->integer('total_numbers'); // Total de números disponíveis para venda
            $table->integer('min_first_purchase'); // Número mínimo na primeira compra do usuário
            $table->integer('max_per_purchase'); // Número máximo por compra
            $table->decimal('price_per_number', 10, 2); // Preço unitário de cada número (R$)
            $table->date('draw_date'); // Data prevista para o sorteio
            $table->boolean('is_active')->default(true); // Se a campanha está ativa para vendas
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
