<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = City::inRandomOrder()->first();
        $name = fake()->name();
        return [
            'name' => $name,
            'username' => Str::slug($name),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'password' => 'asdasdasd', // password
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber,
            'about' => fake()->paragraph('2'),
            'age' => rand(20,50),
            'profile_image_url' => fake()->imageUrl,
            'experience_year' => rand(1,20),
            'expected_salary' => rand(5500,15000),
            'company_name' => fake()->company,
            'is_searchable_for_job' => rand(0,1),
            'user_type' => User::TYPES[array_rand(User::TYPES)],
            'city_id' => $city->id,
            'district_id' => $city->districts()->inRandomOrder()->first()->id,
            'verify_code' => rand(10000,99999),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
