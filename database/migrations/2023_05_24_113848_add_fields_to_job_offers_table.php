<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_offers', function (Blueprint $table) {
            $table->integer('job_level_id')->nullable();
            $table->integer('job_title_id')->nullable();
            $table->integer('education_level_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->integer('proficiency_level_id')->nullable();
            $table->integer('rate')->default(0);
            $table->integer('offered_salary')->default(0);
            $table->integer('years_of_experience')->default(0);
            $table->integer('zip_code')->nullable();
            $table->timestamp('expiration_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_offers', function (Blueprint $table) {
            $table->dropColumn('job_level_id');
            $table->dropColumn('job_title_id');
            $table->dropColumn('education_level_id');
            $table->dropColumn('language_id');
            $table->dropColumn('proficiency_level_id');
            $table->dropColumn('rate');
            $table->dropColumn('offered_salary');
            $table->dropColumn('years_of_experience');
            $table->dropColumn('zip_code');
            $table->dropColumn('expiration_date');
        });
        
    }
}
