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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // ID único da compra
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para usuário
            $table->foreignId('campaign_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para campanha
            $table->integer('quantity'); // Quantidade de números comprados
            $table->decimal('total_amount', 10, 2); // Valor total da compra (quantity * price_per_number)
            $table->string('status')->default('pending'); // Status: 'pending', 'paid', 'cancelled'
            $table->timestamps(); // created_at e updated_at
            
            $table->index('status'); // Index para consultas por status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
