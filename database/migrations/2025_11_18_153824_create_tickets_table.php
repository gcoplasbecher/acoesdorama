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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // ID único do ticket/número
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para usuário
            $table->foreignId('campaign_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para campanha
            $table->foreignId('purchase_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para compra
            $table->integer('number'); // Número específico da rifa (ex: 245, 1001, etc)
            $table->timestamps(); // created_at e updated_at
            
            // Garante que o mesmo número não seja vendido duas vezes na mesma campanha
            $table->unique(['campaign_id', 'number']);
            
            // Index para consultas rápidas
            $table->index(['user_id', 'campaign_id']);
            $table->index('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
