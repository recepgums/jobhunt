<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'profile_image_url' => $this->faker->imageUrl,
            'is_searchable' => 1,
            'minimum_salary' => (int)((string)rand(1,5)."000"),
            'maximum_salary' => (int)((string)rand(3,7)."000"),
            'experience_year' => array_rand([null,1,2,3,4,5,6,7]),
            'age' => rand(20,50),
            'description' => $this->faker->paragraph('1'),
            'facebook_url' => $this->faker->url,
            'linkedin_url' => $this->faker->url,
            'website_url' => $this->faker->url,
        ];
    }
}
