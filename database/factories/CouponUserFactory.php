<?php

namespace Database\Factories;

use App\Models\Coupons;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CouponUser>
 */
class CouponUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $modelArray = [Job::class];

        $modelType = $modelArray[array_rand($modelArray)];
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'coupon_id' => Coupons::query()->inRandomOrder()->first()->id,
            'model_type' => $modelType,
            'model_id' => $modelType::inRandomOrder()->first()->id,
        ];
    }
}
