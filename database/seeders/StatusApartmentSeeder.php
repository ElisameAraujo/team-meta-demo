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
            'status_name' => 'Available',
            'css_class' => 'badge-success',
        ])->create([
            'id' => 2,
            'status_name' => 'Reserved',
            'css_class' => 'badge-warning',
        ])->create([
            'id' => 3,
            'status_name' => 'Sold',
            'css_class' => 'badge-error',
        ]);
    }
}
