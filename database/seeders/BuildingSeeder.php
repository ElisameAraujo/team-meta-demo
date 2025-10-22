<?php

namespace Database\Seeders;

use App\Models\Admin\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{

    public function run(): void
    {
        Building::create([
            'id' => 1,
            'building_name' => 'The Complex',
            'building_slug' => 'the-complex',
            'apartments_available' => 415
        ]);
    }
}
