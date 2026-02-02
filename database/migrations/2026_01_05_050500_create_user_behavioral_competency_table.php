<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla pivote para competencias comportamentales del usuario
     */
    public function up(): void
    {
        Schema::create('user_behavioral_competency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('behavioral_competency_id')->constrained()->onDelete('cascade');
            $table->integer('level')->default(1)->comment('Nivel de desarrollo: 1-5');
            $table->timestamps();

            $table->unique(['user_id', 'behavioral_competency_id'], 'user_competency_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_behavioral_competency');
    }
};
