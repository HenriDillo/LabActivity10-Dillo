<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Author>
 */
class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'position' => fake()->randomElement([
                'Kagawad', 'Barangay Secretary', 'BHW', 'Tanod', 'Treasurer',
            ]),
            'email'    => fake()->unique()->userName() . '@bulletin.test',
        ];
    }
}
