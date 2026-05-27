<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data from the table if needed
        DB::table('userlogs')->truncate();

        // Seed data without specifying 'id' to let the database handle auto-increment
        DB::table('userlogs')->insert([
            ['userId' => 10, 'userEmail' => 'terry@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-05 04:12:00'],
            ['userId' => 10, 'userEmail' => 'terry@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-05 04:14:44'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-05 04:19:52'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-05 08:53:33'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-05 17:35:34'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-06 02:43:01'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-06 15:18:49'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-07 09:35:23'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-03-07 09:59:55'],
            ['userId' => 22, 'userEmail' => 'colin@gmail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-06-16 14:51:24'],
            ['userId' => 22, 'userEmail' => 'colin@gmail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2021-12-12 15:31:50'],
            ['userId' => 22, 'userEmail' => 'colin@gmail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-02 16:01:31'],
            ['userId' => 21, 'userEmail' => 'ross@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-02 16:52:47'],
            ['userId' => 20, 'userEmail' => 'richards@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 13:15:00'],
            ['userId' => 24, 'userEmail' => 'jennifer@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 14:32:09'],
            ['userId' => 24, 'userEmail' => 'jennifer@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 14:34:17'],
            ['userId' => 19, 'userEmail' => 'bruce@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 14:44:31'],
            ['userId' => 27, 'userEmail' => 'nancy@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 15:00:46'],
            ['userId' => 32, 'userEmail' => 'liamoore@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 15:48:35'],
            ['userId' => 32, 'userEmail' => 'liamoore@mail.com', 'userIp' => hex2bin('3a3a31'), 'city' => '', 'country' => '', 'loginTime' => '2022-04-03 15:51:34'],
        ]);
    }
}
