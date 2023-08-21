<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'BCA',
                'description' => 'Description for course',
                'stream_id' => 1,
                'category_id' => 1,
                'code' => 'BCA',
            ],
            [
                'name' => 'MCA',
                'description' => 'Description for course',
                'stream_id' => 1,
                'category_id' => 2,
                'code' => 'MCA',
            ],
            [
                'name' => 'B.Com',
                'description' => 'Description for course',
                'stream_id' => 2,
                'category_id' => 1,
                'code' => 'BCOM',
            ]
        ];

        foreach ($courses as $course) {
            Course::factory()->create([
                'name' => $course['name'],
                'description' => $course['description'],
                'stream_id' => $course['stream_id'],
                'category_id' => $course['category_id'],
                'code' => $course['code'],
            ]);
        }
    }
}
