<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roles = ['Pişirici', 'Fırın Sahibi','Uncu','Ekipman Satıcısı'];
        return [
            'name' => $this->faker->firstName . " " . $this->faker->lastName,
            'role' => $roles[array_rand($roles)],
            'review' => $this->faker->paragraph(2),
            'order' => rand(1,10),
        ];
    }
}
