<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla pivote para preferencias de liderazgo del usuario
     */
    public function up(): void
    {
        Schema::create('user_leadership_preference', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('leadership_preference_id')->constrained()->onDelete('cascade');
            $table->integer('importance')->default(1)->comment('Importancia: 1-5 (1=más importante)');
            $table->timestamps();

            $table->unique(['user_id', 'leadership_preference_id'], 'user_leadership_pref_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_leadership_preference');
    }
};
