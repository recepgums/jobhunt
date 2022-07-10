<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkExperienceFactory extends Factory
{
    public function definition()
    {
        $startDate = rand(1999, 2018);
        return [
            'candidate_id' => Candidate::query()->inRandomOrder()->first()->id,
            'company_name' => $this->faker->company,
            'title' => $this->faker->title,
            'start_date' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' weeks')),
            'end_date' =>  date('Y-m-d', strtotime( '+'.mt_rand(20,40).' weeks')),
            'summary' => $this->faker->paragraph('1'),
        ];
    }
}
