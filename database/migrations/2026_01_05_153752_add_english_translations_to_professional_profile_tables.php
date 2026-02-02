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
        Schema::table('behavioral_competencies', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
        });

        Schema::table('power_skills', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
        });

        Schema::table('organizational_culture_values', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
        });

        Schema::table('leadership_preferences', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->text('description_en')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('behavioral_competencies', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'description_en']);
        });

        Schema::table('power_skills', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'description_en']);
        });

        Schema::table('organizational_culture_values', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'description_en']);
        });

        Schema::table('leadership_preferences', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'description_en']);
        });
    }
};
