<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);
        return [
            'name' => $title,
            'slug' => $slug,
            // 'book_id' => Book::inRandomOrder()->first()->id,
            'chapter_id' => Chapter::inRandomOrder()->first()->id,
            'body' => $this->faker->paragraph(100, true)
        ];
    }
}
