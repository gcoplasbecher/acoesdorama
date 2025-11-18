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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // ID único do pagamento
            $table->foreignId('purchase_id')->constrained()->cascadeOnDelete(); // Chave estrangeira para compra
            $table->string('payment_gateway')->default('mercadopago'); // Gateway: 'mercadopago', 'pagseguro', etc
            $table->string('gateway_payment_id')->nullable(); // ID único do pagamento no gateway externo
            $table->string('status')->default('pending'); // Status: 'pending', 'approved', 'rejected', 'cancelled'
            $table->decimal('amount', 10, 2); // Valor do pagamento (deve ser igual ao total_amount da compra)
            $table->text('pix_qr_code')->nullable(); // QR Code PIX para pagamento
            $table->text('pix_qr_code_base64')->nullable(); // QR Code PIX em base64 para exibição
            $table->text('pix_copy_paste')->nullable(); // Código PIX para copiar e colar
            $table->datetime('expires_at')->nullable(); // Data e hora de expiração do PIX
            $table->json('gateway_response')->nullable(); // Resposta completa do gateway para debug
            $table->timestamps(); // created_at e updated_at
            
            // Indexes para consultas rápidas
            $table->index('gateway_payment_id');
            $table->index('status');
            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
