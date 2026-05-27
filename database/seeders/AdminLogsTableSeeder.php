<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adminlog')->insert([
            [
                'adminid' => 1, // Assuming admin with id 1 exists
                'ip' => inet_pton('192.168.1.1'), // Converting IP address to binary format
                'logintime' => '2024-08-23 14:00:00',
            ],
            [
                'adminid' => 1, // Assuming admin with id 1 exists
                'ip' => inet_pton('192.168.1.2'),
                'logintime' => '2024-08-23 15:00:00',
            ],
        ]);
    }
}
