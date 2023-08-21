<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            [
                'principal_name' => 'John',
                'name' => 'HCM College',
                'description' => 'Description for college',
                'code' => 'LCM',
                'streams' => ['4'],
                'addresss' => '123 Main St',
                'city' => 'Example City',
                'state' => 'Example State',
                'zip' => '12345',
                'email' => 'john12@example.com',
                'phone' => '123-456-7891',
                'banner_image' => 'example.jpg',
            ],
            [
                'principal_name' => 'Mohan',
                'name' => 'HCM College',
                'description' => 'Description for college',
                'code' => 'HCM',
                'streams' => ['3'],
                'addresss' => '456 Elm St',
                'city' => 'Another City',
                'state' => 'Another State',
                'zip' => '54321',
                'email' => 'mohan34@example.com',
                'phone' => '987-654-3211',
                'banner_image' => 'mohan.jpg',
            ],
        ];

        foreach ($colleges as $college) {
            College::create($college);
        }
    }
}
