<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Education;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'candidate_id' => Candidate::query()->inRandomOrder()->first()->id,
            'work_experience_id' => WorkExperience::query()->inRandomOrder()->first()->id,
            'education_id' => Education::query()->inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'cover_letter' => $this->faker->paragraph('1'),
            'url' => $this->faker->url,
            'file_name' => "asdsa.jpg",
        ];
    }
}
