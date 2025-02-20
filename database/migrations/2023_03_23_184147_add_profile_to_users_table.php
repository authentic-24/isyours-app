<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('identification')->nullable();
            $table->string('address')->nullable();
            $table->integer('zip_code')->nullable();
            $table->boolean('is_agree_terms_privacy')->default(false);
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
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('city_id');
            $table->dropColumn('phone_number');
            $table->dropColumn('identification');
            $table->dropColumn('address');
            $table->dropColumn('zip_code');
            $table->dropColumn('is_agree_terms_privacy');
        });
    }
}
