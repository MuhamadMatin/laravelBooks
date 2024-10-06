<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\LikeBook;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        User::factory(400)->create();
        Category::factory(5)->create();
        Book::factory(1500)->create()->each(function ($book) {
            $chapters = Chapter::factory(rand(2, 5))->create(['book_id' => $book->id]);

            $chapters->each(function ($chapter) use ($book) {
                Page::factory(rand(3, 10))->create([
                    'book_id' => $book->id,
                    'chapter_id' => $chapter->id,
                ]);
            });
        });

        $books = Book::all();
        $users = User::all();

        foreach ($books as $book) {
            $numberLikes = rand(100, 300);
            $usersLike = $users->random($numberLikes);

            $book->Likes()->attach(
                $usersLike->pluck('id')->toArray()
            );
        }
    }
}
