<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupons>
 */
class CouponsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = rand(0,1);

        return [
            'name' => $this->faker->name,
            'code' => Str::random(4),
            'price' => $rand ? rand(1,20) : null,
            'rate' => $rand ? null : $this->faker->name,
            'expire_at' =>  now()->addDay(rand(1,5))->toDateTimeString(),
        ];
    }
}
