<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'company_name' => $this->faker->company,
            'category_id' => Job::CATEGORIES[array_rand(Job::CATEGORIES)],
            'district_id' => District::query()->inRandomOrder()->first()->id,
            'team_size' => rand(1,94),
            'since' => rand(1980,2022),
        ];
    }
}
