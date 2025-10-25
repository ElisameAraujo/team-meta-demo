<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $counter = 1;
        return [
            'unit_code' => 'TC' . Str::padLeft($counter++, 3, 0),
            'total_area' => fake()->randomFloat(2, 50, 100),
            'covered_area' => fake()->randomFloat(2, 50, 100),
            'semi_covered_area' => fake()->randomFloat(2, 50, 100),
            'uncovered_area' => fake()->randomFloat(2, 50, 100),
            'common_area' => fake()->randomFloat(2, 50, 100),
            'ambients' => fake()->numberBetween(1, 4),
            'storage_size' => fake()->randomFloat(2, NULL, 10),
            'floor' => fake()->numberBetween(0, 4),
            'price' => fake()->randomFloat(2, 85000, 350000),
            'apartment_status_id' => fake()->numberBetween(1, 3),
            'section_id' => fake()->numberBetween(1, 2),
            'building_id' => fake()->numberBetween(1, 1),
        ];
    }
}
