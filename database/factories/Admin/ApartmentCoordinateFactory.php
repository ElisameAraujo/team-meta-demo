<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\ApartmentCoordinate>
 */
class ApartmentCoordinateFactory extends Factory
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
            'x_position' => fake()->randomFloat(2, 500, 1200),
            'y_position' => fake()->randomFloat(2, 500, 1200),
            'width' => fake()->randomFloat(2, 80, 300),
            'height' => fake()->randomFloat(2, 80, 300),
            'apartment_id' => Str::padLeft($counter++, 3, 0),
        ];
    }
}
