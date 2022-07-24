<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{

    public function definition()
    {
        return [
            'question' => $this->faker->paragraph(1),
            'answer' => $this->faker->paragraph(3),
            'order' => rand(1,50),
            'is_published' => true,
        ];
    }
}
