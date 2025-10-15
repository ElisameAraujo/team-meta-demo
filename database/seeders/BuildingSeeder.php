<?php

namespace Database\Seeders;

use App\Models\Admin\Building;
use Database\Factories\BuildingFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{

    public function run(): void
    {
        Building::create([
            'id' => 2,
            'building_name' => 'El Muelle II',
            'building_slug' => 'el-muelle-ii',
            'apartments_available' => 76
        ])->create([
            'id' => 1,
            'building_name' => 'El Muelle III',
            'building_slug' => 'el-muelle-iii',
            'apartments_available' => 86
        ]);
    }
}
