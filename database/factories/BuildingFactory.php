<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $counter = 1;

        $building_name = fake()->word();

        return [
            'building_name' => $building_name,
            'apartments_available' => fake()->numberBetween(32, 76),
            'background_image' => 'default_image',
            'building_slug' => Str::slug($building_name)
        ];
    }
}
