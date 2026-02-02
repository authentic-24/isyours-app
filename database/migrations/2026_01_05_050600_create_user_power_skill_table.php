<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla pivote para power skills del usuario
     */
    public function up(): void
    {
        Schema::create('user_power_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('power_skill_id')->constrained()->onDelete('cascade');
            $table->integer('level')->default(1)->comment('Nivel de dominio: 1-5');
            $table->timestamps();

            $table->unique(['user_id', 'power_skill_id'], 'user_power_skill_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_power_skill');
    }
};
