<?php

namespace Database\Seeders;

use App\Models\Admin\Building;
use Database\Factories\BuildingFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{

    /* public function run(): void
    {
        Building::factory(BuildingFactory::class)->count(3)->create();
    } */
    public function run(): void
    {
        Building::create([
            'building_name' => 'El Muelle I',
            'background' => 'default_image',
            'building_slug' => 'el-muelle-i',
            'apartments_available' => 57
        ])->create([
            'building_name' => 'El Muelle II',
            'background' => 'default_image',
            'building_slug' => 'el-muelle-ii',
            'apartments_available' => 76
        ])->create([
            'building_name' => 'El Muelle III',
            'background' => 'default_image',
            'building_slug' => 'el-muelle-iii',
            'apartments_available' => 86
        ]);
    }
}
