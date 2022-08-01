<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word;

        $models = [Job::class, Blog::class];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'model' => $models[array_rand($models)],
            'description' => $this->faker->paragraph(1),
            'default_cover_image' => $this->faker->imageUrl,
        ];
    }
}
