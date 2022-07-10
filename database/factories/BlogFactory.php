<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = join(' ',$this->faker->words(4));

        return [
            'category_id' => Categories::query()->forBlog()->inRandomOrder()->first()->id,
            'cover_image' => $this->faker->imageUrl,
            'title' => $title,
            'summary' => $this->faker->text(100),
            'slug' => Str::slug($title),
            'content' => $this->faker->randomHtml('5','5'),
            'seen_count' => rand(10,599),
        ];
    }
}
