<?php

namespace Database\Seeders;

use App\Models\Admin\ApartmentCoordinate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentCoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApartmentCoordinate::factory(ApartmentCoordinatesSeeder::class)->count(250)->create();
    }
}
