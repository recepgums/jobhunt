<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::factory(5)->create()->each(function ($review){
            $review->addMediaFromUrl('https://st.depositphotos.com/1224365/2498/i/450/depositphotos_24980235-stock-photo-portrait-of-a-normal-man.jpg')->toMediaCollection('images');
        });
    }
}
