<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla pivote para valores de cultura organizacional que el usuario busca
     */
    public function up(): void
    {
        Schema::create('user_culture_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('organizational_culture_value_id')->constrained()->onDelete('cascade');
            $table->integer('priority')->default(1)->comment('Prioridad: 1-5 (1=más importante)');
            $table->timestamps();

            $table->unique(['user_id', 'organizational_culture_value_id'], 'user_culture_value_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_culture_value');
    }
};
