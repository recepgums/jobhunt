<?php

namespace Database\Factories;

use App\Models\Education;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startYear = rand(1980,2018);
        return [
            'candidate_id' => User::query()->inRandomOrder()->first()->id,
            'type' => Education::TYPE[array_rand(Education::TYPE)],
            'name' => $this->faker->streetName,
            'department_name' => $this->faker->streetName,
            'description' => $this->faker->paragraph('1'),
            'start_year' => $startYear,
            'end_year' => $startYear+4,
        ];
    }
}
