<?php

namespace Database\Seeders;

use App\Models\Admin\ApartmentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApartmentStatus::create([
            'id' => 1,
            'status' => 'Available',
            'css_class' => 'badge-success',
        ])->create([
            'id' => 2,
            'status' => 'Reserved',
            'css_class' => 'badge-warning',
        ])->create([
            'id' => 3,
            'status' => 'Sold',
            'css_class' => 'badge-error',
        ]);
    }
}
