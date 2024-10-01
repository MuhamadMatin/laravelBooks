<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(5)->create();
        Book::factory(1000)->create()->each(function ($book) {
            // Create 2-5 chapters for each book
            $chapters = Chapter::factory(rand(2, 5))->create(['book_id' => $book->id]);

            // Create 3-10 pages for each chapter
            $chapters->each(function ($chapter) use ($book) {
                Page::factory(rand(3, 10))->create([
                    'book_id' => $book->id,
                    'chapter_id' => $chapter->id,
                ]);
            });
        });

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
