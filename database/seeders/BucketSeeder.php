<?php

namespace Database\Seeders;

use App\Models\BucketModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BucketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BucketModel::insert([
            [
                'name' => 'Bucket A',
                'volume' => 20,
                'ball_count' => 0,
                'empty_volume' => 0.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bucket B',
                'volume' => 18,
                'ball_count' => 0,
                'empty_volume' => 0.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bucket C',
                'volume' => 12,
                'ball_count' => 0,
                'empty_volume' => 0.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bucket D',
                'volume' => 10,
                'ball_count' => 0,
                'empty_volume' => 0.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bucket E',
                'volume' => 8,
                'ball_count' => 0,
                'empty_volume' => 0.0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
