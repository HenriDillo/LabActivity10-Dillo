<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();

        // 40 published posts
        Post::factory()->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 10 drafts
        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // My pinned post, written by my Kagawad, published on my birthday in 2026
        $kagawad = Author::where('email', 'kagawad.dillo@bulletin.test')->first();

        Post::create([
            'author_id'    => $kagawad->id,
            'title'        => 'Purok Dillo Clean-up Drive',
            'category'     => 'Announcement',
            'body'         => "Calling all residents of Purok Dillo! Join our barangay clean-up drive this Saturday morning. "
                . "Bring your own gloves, sacks and rakes. We will clear the canals and the roadside near the Matina Crossing Hall.\n\n"
                . "Merienda will be provided by the barangay after the activity. Let's keep our purok clean and flood-free.",
            'is_published' => true,
            'is_pinned'    => true,
            'published_at' => '2026-08-17 08:00:00',
        ]);
    }
}
