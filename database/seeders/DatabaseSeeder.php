<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Seed the admin table
        $this->call(AdminsTableSeeder::class);
        // Seed the users table
        $this->call(UserRegistrationsTableSeeder::class);
         // Seed the users table
         $this->call(RegistrationsTableSeeder::class);
          // Seed the users table
        $this->call(CoursesTableSeeder::class);

        // Seed the rooms table
        $this->call(RoomsTableSeeder::class);

        // Seed the states table
        $this->call(StatesTableSeeder::class);

        // Seed the user logs table
        $this->call(UserLogsTableSeeder::class);

        // Seed the admin logs table
        $this->call(AdminLogsTableSeeder::class);
    }
}
