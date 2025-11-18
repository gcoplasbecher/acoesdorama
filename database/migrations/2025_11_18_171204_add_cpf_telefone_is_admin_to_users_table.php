<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf')->nullable()->after('name');
            $table->string('telefone')->nullable()->after('cpf');
            $table->boolean('is_admin')->default(false)->after('telefone');
        });

        DB::table('users')->insert([
            'name' => 'acoesdorama',
            'email' => 'admin@acoesdorama.com',
            'cpf' => '12345678900',
            'telefone' => '11999999999',
            'is_admin' => true,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cpf', 'telefone', 'is_admin']);
        });
    }
};
