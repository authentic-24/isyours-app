<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar campo temporal para migrar los datos
            $table->string('security_id_temp', 20)->nullable()->after('security_id');
            // Agregar campo para los 4 últimos dígitos del security ID
            $table->string('security_id_last_digits', 4)->nullable()->after('security_id');
        });

        // Migrar los datos a la columna temporal
        DB::statement("UPDATE users SET security_id_temp = CASE WHEN security_id = 1 THEN 'yes' WHEN security_id = 0 THEN 'no' ELSE 'no' END WHERE security_id IS NOT NULL");

        Schema::table('users', function (Blueprint $table) {
            // Eliminar la columna antigua
            $table->dropColumn('security_id');
        });

        Schema::table('users', function (Blueprint $table) {
            // Renombrar la columna temporal a security_id
            $table->renameColumn('security_id_temp', 'security_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revertir a tinyint/bigint
            $table->unsignedTinyInteger('security_id')->nullable()->change();
            $table->dropColumn('security_id_last_digits');
        });
    }
};
