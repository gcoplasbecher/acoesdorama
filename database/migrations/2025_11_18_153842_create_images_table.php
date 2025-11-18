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
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // ID único da imagem
            $table->string('path'); // Caminho relativo no storage (ex: 'campaigns/abc123.jpg')
            $table->string('disk')->default('public'); // Disco de armazenamento
            $table->morphs('imageable'); // imageable_id e imageable_type para relacionamento polimórfico
            $table->integer('order_column')->default(0); // Ordem de exibição
            $table->boolean('is_primary')->default(false); // Imagem principal
            $table->text('caption')->nullable(); // Legenda
            $table->timestamps(); // created_at e updated_at
            $table->index('is_primary'); // Index para consultas por imagem principal
            $table->index('order_column'); // Index para consultas por ordem
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
