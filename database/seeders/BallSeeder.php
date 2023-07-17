<?php

namespace Database\Seeders;

use App\Models\BallModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BallModel::insert([
            [
                'name' => 'PINK',
                'volume' => 2.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RED',
                'volume' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BLUE',
                'volume' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ORANGE',
                'volume' => 0.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'GREEN',
                'volume' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
