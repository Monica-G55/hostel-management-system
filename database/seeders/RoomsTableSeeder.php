<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Optional: Clear existing data from the table if needed
        DB::table('rooms')->truncate();

        // Seed data without specifying 'id' to let the database handle auto-increment
        DB::table('rooms')->insert([
            [
                'seater' => 5,
                'room_no' => 100,
                'fees' => 1990,
                'posting_date' => '2020-09-20 04:24:06',
            ],
            [
                'seater' => 4,
                'room_no' => 201,
                'fees' => 1650,
                'posting_date' => '2020-09-20 04:24:06',
            ],
            [
                'seater' => 2,
                'room_no' => 200,
                'fees' => 910,
                'posting_date' => '2020-09-20 04:33:06',
            ],
            [
                'seater' => 3,
                'room_no' => 112,
                'fees' => 1300,
                'posting_date' => '2020-09-20 04:33:30',
            ],
            [
                'seater' => 5,
                'room_no' => 132,
                'fees' => 1990,
                'posting_date' => '2020-09-20 04:28:52',
            ],
            [
                'seater' => 4,
                'room_no' => 11,
                'fees' => 1650,
                'posting_date' => '2021-03-07 05:01:02',
            ],
            [
                'seater' => 2,
                'room_no' => 269,
                'fees' => 910,
                'posting_date' => '2022-04-03 14:39:22',
            ],
            [
                'seater' => 1,
                'room_no' => 310,
                'fees' => 750,
                'posting_date' => '2022-04-03 14:41:36',
            ],
            [
                'seater' => 1,
                'room_no' => 330,
                'fees' => 750,
                'posting_date' => '2022-04-03 14:41:53',
            ],
        ]);
    }
}
