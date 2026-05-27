<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'id' => 1,
                'course_code' => 'BTH123',
                'course_sn' => 'B.Tech',
                'course_fn' => 'Bachelor Of Technology',
                'posting_date' => '2020-09-23 00:45:13',
            ],
            [
                'id' => 2,
                'course_code' => 'BCOM18',
                'course_sn' => 'B.Com',
                'course_fn' => 'Bachelor Of Commerce',
                'posting_date' => '2020-09-23 00:45:13',
            ],
            [
                'id' => 3,
                'course_code' => 'BSC296',
                'course_sn' => 'BSC',
                'course_fn' => 'Bachelor Of Science',
                'posting_date' => '2020-09-23 00:45:13',
            ],
            [
                'id' => 4,
                'course_code' => 'BCOA55',
                'course_sn' => 'BCA',
                'course_fn' => 'Bachelor Of Computer Application',
                'posting_date' => '2020-09-23 00:45:13',
            ],
            [
                'id' => 5,
                'course_code' => 'MCA001',
                'course_sn' => 'MCA',
                'course_fn' => 'Master of Computer Application',
                'posting_date' => '2020-09-23 00:47:13',
            ],
            [
                'id' => 6,
                'course_code' => 'MBA777',
                'course_sn' => 'MBA',
                'course_fn' => 'Master In Business Administration',
                'posting_date' => '2020-09-23 00:54:13',
            ],
            [
                'id' => 7,
                'course_code' => 'BE069',
                'course_sn' => 'BE',
                'course_fn' => 'Bachelor of Engineering',
                'posting_date' => '2020-09-23 00:59:13',
            ],
            [
                'id' => 8,
                'course_code' => 'BIT353',
                'course_sn' => 'BIT',
                'course_fn' => 'Bachelors In Information Technology',
                'posting_date' => '2021-03-07 06:59:05',
            ],
            [
                'id' => 9,
                'course_code' => 'MIT005',
                'course_sn' => 'MIT',
                'course_fn' => 'Master of Information Technology',
                'posting_date' => '2022-04-03 13:03:19',
            ],
        ]);
    }
}

