<?php

namespace Database\Seeders;

use App\Models\Admin\Direction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Direction::create([
            'direction_name' => 'East',
            'direction_slug' => 'east'
        ])->create([
            'direction_name' => 'West',
            'direction_slug' => 'west'
        ])->create([
            'direction_name' => 'North',
            'direction_slug' => 'north'
        ])->create([
            'direction_name' => 'South',
            'direction_slug' => 'south'
        ]);
    }
}
