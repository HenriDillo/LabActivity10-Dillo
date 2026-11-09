# Barangay Bulletin – Purok Dillo

Lab Activity 10 (4-334 Full-Stack Web Development): Eloquent, migrations and seeding.
A small blog for Barangay Matina Crossing Hall, Davao City. Officials publish posts, and residents can browse, search and page through them.

Built with Laravel 12, SQLite, Blade and Tailwind CSS v4.

## My personal details

- **Posts per page:** 6. My last name, Dillo, has only 5 letters, which is below the minimum, so the lab rule says to use 6. It is the `PER_PAGE` constant in `PostController`.
- **Custom category:** Sports & Youth (the other four are Announcement, Health, Peace & Order, Ayuda).
- **Kagawad author:** Kagawad Henri James Dillo (`kagawad.dillo@bulletin.test`), made by hand with `Author::create()` in `AuthorSeeder`.
- **Pinned post:** "Purok Dillo Clean-up Drive", published on **August 17, 2026** (my birthday), made with `Post::create()` in `PostSeeder`.

## How to run it

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve
```

If `database/database.sqlite` does not exist, create it first (`touch database/database.sqlite`, or `New-Item database/database.sqlite` in PowerShell).

After seeding there should be 5 authors and 51 posts (40 published, 10 drafts, 1 pinned).

## Routes

| URL | What it does |
| --- | --- |
| `/` | redirects to `/posts` |
| `/posts` | published posts only, pinned first then newest; supports `?q=` (title search) and `?category=` |
| `/posts/{id}` | one post; drafts and missing ids return 404; each visit adds 1 to `views` |

## Notes

- `views` was added by its own migration (`add_views_to_posts_table`), not by editing the posts migration.
- Relationships are Week 11, so cards show the author ID instead of the name.
- `docs/tinker.png` shows the `find()` → change attribute → `save()` demo.
