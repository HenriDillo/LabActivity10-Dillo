<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_id'    => Author::factory(),
            'title'        => fake()->sentence(6),
            'category'     => fake()->randomElement([
                'Announcement', 'Health', 'Peace & Order', 'Ayuda', 'Sports & Youth',
            ]),
            'body'         => fake()->paragraphs(3, true),
            'is_published' => true,
            'published_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }

    // Drafts are hidden from the public list and have no publish date.
    public function draft(): static
    {
        return $this->state(fn () => ['is_published' => false, 'published_at' => null]);
    }
}
