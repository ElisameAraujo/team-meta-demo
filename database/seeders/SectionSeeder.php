<?php

namespace Database\Seeders;

use App\Models\Admin\Direction;
use App\Models\Admin\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'section_name' => 'East',
            'section_slug' => 'east'
        ])->create([
            'section_name' => 'West',
            'section_slug' => 'west'
        ])->create([
            'section_name' => 'North',
            'section_slug' => 'north'
        ])->create([
            'section_name' => 'South',
            'section_slug' => 'south'
        ]);
    }
}
