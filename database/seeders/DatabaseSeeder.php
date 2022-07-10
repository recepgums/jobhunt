<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Candidate;
use App\Models\Categories;
use App\Models\City;
use App\Models\District;
use App\Models\Education;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Package;
use App\Models\Resume;
use App\Models\User;
use App\Models\WorkExperience;
use App\Models\WorkType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *`
     * @return void
     */
    public function run()
    {

        $data = json_decode(file_get_contents('https://gist.githubusercontent.com/SadMap/13b2fd1a5a8e6ff47442c72cbed86dc3/raw/896f8c76abbfb5bddf6368d5b59e775a71f5fd11/mgm-iller.json'));

        foreach ($data as $key => $city) {
            $cityRecord = City::create([
                'name' => $city->il,
            ]);

            foreach ($city->ilceler as $ilce) {
                if (optional($ilce)->ad) {
                    District::create([
                        'city_id' => $cityRecord->id,
                        'name' => $ilce->ad
                    ]);
                }
            }
        }

        User::create([
            'name' => fake()->name(),
            'email' => 'asd@asd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();

        WorkType::create(['name' => 'Tam Zamanlı', 'type' => WorkType::TYPES['Full Time']]);
        WorkType::create(['name' => 'Yarı Zamanlı', 'type' => WorkType::TYPES['Part Time']]);
        WorkType::create(['name' => 'Karışık', 'type' => WorkType::TYPES['Hybrit']]);

        Categories::factory(50)->create();

        Blog::factory(300)->create();
        Job::factory(300)->create();
        Employer::factory(30)->create();
        Candidate::factory(30)->create();
        WorkExperience::factory(30)->create();
        Education::factory(30)->create();
        Resume::factory(30)->create();

        Package::factory(5)->create();
    }
}
