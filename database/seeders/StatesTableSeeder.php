<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->truncate(); // Clear existing data

        DB::table('states')->insert([
            ['State' => 'Alabama'],
            ['State' => 'Alaska'],
            ['State' => 'Arizona'],
            ['State' => 'Arkansas'],
            ['State' => 'California'],
            ['State' => 'Colorado'],
            ['State' => 'Connecticut'],
            ['State' => 'Delaware'],
            ['State' => 'Florida'],
            ['State' => 'Georgia'],
            ['State' => 'Hawaii'],
            ['State' => 'Idaho'],
            ['State' => 'Illinois'],
            ['State' => 'Iowa'],
            ['State' => 'Kansas'],
            ['State' => 'Kentucky'],
            ['State' => 'Louisiana'],
            ['State' => 'Maine'],
            ['State' => 'Maryland'],
            ['State' => 'Massachusetts'],
            ['State' => 'Michigan'],
            ['State' => 'Minnesota'],
            ['State' => 'Mississippi'],
            ['State' => 'Missouri'],
            ['State' => 'Nevada'],
            ['State' => 'New Jersey'],
            ['State' => 'New York'],
            ['State' => 'North Carolina'],
            ['State' => 'North Dakota'],
            ['State' => 'Ohio'],
            ['State' => 'Oklahoma'],
            ['State' => 'South Carolina'],
            ['State' => 'South Dakota'],
            ['State' => 'Texas'],
            ['State' => 'Virginia'],
            ['State' => 'Washington'],
        ]);
    }
}
