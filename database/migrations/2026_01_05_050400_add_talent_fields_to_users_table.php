<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Agregar campos de talentos innatos y potenciales al perfil del usuario
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('innate_talent')->nullable()->after('visa_number');
            $table->text('potential_talent')->nullable()->after('innate_talent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['innate_talent', 'potential_talent']);
        });
    }
};
