<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Category;
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
        User::factory(20)->create();
        Category::factory(5)->create();
        Book::factory(1500)->create()->each(function ($book) {
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

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $editorRole = Role::create([
            'name' => 'editor'
        ]);

        $userRole = Role::create([
            'name' => 'user'
        ]);

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'roles' => $adminRole,
            ],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('editor'),
                'roles' => $editorRole,
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('user1'),
                'roles' => $userRole,
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('user2'),
                'roles' => $userRole,
            ],
            [
                'name' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('user3'),
                'roles' => $userRole,
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ])->assignRole($user['roles']);
        }
    }
}
