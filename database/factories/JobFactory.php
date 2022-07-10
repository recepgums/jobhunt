<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\City;
use App\Models\District;
use App\Models\Job;
use App\Models\User;
use App\Models\WorkType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->paragraph(2);

        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'city_id' => City::query()->inRandomOrder()->first()->id,
            'category_id' => Categories::query()->forJob()->inRandomOrder()->first()->id,
            'title' => $title,
            'description' => $this->faker->text(30),
            'slug' => Str::slug($title),
            'cover_image' => $this->faker->imageUrl,
            'work_type_id' => WorkType::query()->inRandomOrder()->first()->id,
            'district_id' => District::query()->inRandomOrder()->first()->id,
            'fee' => rand(10,1500),
            'level' => Job::LEVEL[array_rand(Job::LEVEL)],
            'gender' => Job::GENDER[array_rand(Job::GENDER)],
            'qualification' => Job::QUALIFICATIONS[array_rand(Job::QUALIFICATIONS)],
            'has_contract' => rand(0,1),
            'status' => Job::STATUS['published'],
            'published_until_at' => $this->faker->dateTimeBetween('now','+2 weeks'),
        ];
    }
}
