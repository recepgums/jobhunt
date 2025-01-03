<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Categories;
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
        $selectedModel = $models[array_rand($models)];
        $rand = rand(1,4);
        $parentId = null;

        if ($selectedModel === Job::class){
            if ($rand %3 === 0){
                $parentId = optional(Categories::query()->forJob()->inRandomOrder()->first())->id;
            }
        }
        return [
            'name' => $name,
            'parent_id' => $parentId,
            'slug' => Str::slug($name),
            'model' =>  $selectedModel,
            'description' => $this->faker->paragraph(1),
            'default_cover_image' => 'https://image.shutterstock.com/image-photo/suleymaniye-mosque-during-sunset-istanbul-600w-1889028265.jpg',
        ];
    }
}
