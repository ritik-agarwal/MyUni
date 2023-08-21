<?php

namespace Database\Seeders;

use App\Models\Stream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $streams = [
            [
                'name' => 'Engineering',
                'description' => 'Description for engineering stream',
                'code' => 'ENGG',
            ],
            [
                'name' => 'Commerce',
                'description' => 'Description for commerce stream',
                'code' => 'COMM',
            ],
            [
                'name' => 'Arts',
                'description' => 'Description for arts stream',
                'code' => 'ART',
            ]
        ];

        foreach ($streams as $stream) {
            Stream::factory()->create([
                'name' => $stream['name'],
                'description' => $stream['description'],
                'code' => $stream['code'],
            ]);
        }
    }
}
