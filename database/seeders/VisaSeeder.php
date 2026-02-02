<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('visa')->insert([
            [
                'code' => 'USC',
                'name' => 'U.S. Citizen',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
