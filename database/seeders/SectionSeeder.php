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
            'section_name' => 'Front',
            'section_slug' => 'front'
        ])->create([
            'section_name' => 'Back',
            'section_slug' => 'back'
        ]);
    }
}
