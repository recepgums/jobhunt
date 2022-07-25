<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\City;
use App\Models\Package;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workshop>
 */
class WorkshopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = City::inRandomOrder()->first();
        $title = $this->faker->paragraph(1);
        $isNightMode = rand(0,1);
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Categories::forJob()->inRandomOrder()->first()->id,
            'city_id' => $city->id,
            'district_id' => $city->districts()->inRandomOrder()->first()->id,
            'sale_type' => Workshop::SALE_TYPE[array_rand(Workshop::SALE_TYPE)],
            'package_id' => Package::inRandomOrder()->first()->id,
            'title' => $title,
            'description' => $this->faker->paragraph(3),
            'slug' => Str::slug($title),
            'contact_name' => $this->faker->name,
            'contact_phone' => $this->faker->phoneNumber,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'price' => (int)(rand(10,1000)."000"),
            'is_price_fixed' => rand(0,1),
            'square' => rand(100,400),
            'night_mode_start_at' => $isNightMode ? $this->faker->time : null,
            'night_mode_end_at' => $isNightMode ? $this->faker->time : null,
            'view_counter' => 0,
        ];
    }
}
