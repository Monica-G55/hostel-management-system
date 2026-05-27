<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        DB::table('admin')->truncate();

        // Seed new data
        DB::table('admin')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('Password@123'), // Hashed password
                'reg_date' => '2020-09-08 20:31:45',
                'updation_date' => '2021-03-07',
            ],
        ]);
    }
}
