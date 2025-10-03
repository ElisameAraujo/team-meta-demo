<?php

namespace Database\Seeders;

use App\Models\Admin\Apartment;
use Database\Factories\Admin\ApartmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartment::factory(ApartmentFactory::class)->count(250)->create();
    }
}
