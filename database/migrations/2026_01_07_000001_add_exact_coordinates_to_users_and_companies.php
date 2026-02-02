<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add exact coordinates to users table
        Schema::table('users', function (Blueprint $table) {
            $table->double('latitude')->nullable()->after('zip_code');
            $table->double('longitude')->nullable()->after('latitude');
            $table->string('full_address')->nullable()->after('address');
        });

        // Add exact coordinates to company_profile table
        Schema::table('company_profile', function (Blueprint $table) {
            $table->double('latitude')->nullable()->after('about');
            $table->double('longitude')->nullable()->after('latitude');
            $table->string('address')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address');
            $table->string('state')->nullable()->after('city');
            $table->string('country')->nullable()->after('state');
            $table->string('zip_code')->nullable()->after('country');
        });

        // Add exact coordinates to job_offers table
        Schema::table('job_offers', function (Blueprint $table) {
            $table->double('latitude')->nullable()->after('zip_code');
            $table->double('longitude')->nullable()->after('latitude');
            $table->string('full_address')->nullable()->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude', 'full_address']);
        });

        Schema::table('company_profile', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude', 'address', 'city', 'state', 'country', 'zip_code']);
        });

        Schema::table('job_offers', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude', 'full_address']);
        });
    }
};
