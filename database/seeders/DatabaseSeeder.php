<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Candidate;
use App\Models\CandidateCategory;
use App\Models\Categories;
use App\Models\City;
use App\Models\District;
use App\Models\Education;
use App\Models\Employer;
use App\Models\Faq;
use App\Models\Gender;
use App\Models\Job;
use App\Models\Package;
use App\Models\Resume;
use App\Models\User;
use App\Models\WorkType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
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
        Faq::factory(10)->create();
        $this->call(ReviewSeeder::class);


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
            'password' => 'asdasdasd',
            'phone' => fake()->phoneNumber,
            'remember_token' => Str::random(10),
        ]);
        Candidate::factory(1)->create(['user_id'=> 1]);

        \App\Models\User::factory(10)->create()->each(function ($user){
            Candidate::factory(1)->create(['user_id'=> $user->id]);
        });
        Package::factory(3)->create();

        WorkType::create(['name' => 'Tam Zamanlı', 'type' => WorkType::TYPES['Full Time']]);
        WorkType::create(['name' => 'Yarı Zamanlı', 'type' => WorkType::TYPES['Part Time']]);
        WorkType::create(['name' => 'Karışık', 'type' => WorkType::TYPES['Hybrit']]);

        Categories::factory(50)->create();
        Gender::insert(['name' => 'Erkek','type' => Gender::TYPES['Erkek']]);
        Gender::insert(['name' => 'Kadın','type' => Gender::TYPES['Kadin']]);

        Blog::factory(100)->create();
        Job::factory(1000)->create();
        Employer::factory(30)->create();


       for ($i= 0; $i<50; $i++){
           CandidateCategory::create([
               'candidate_id' => Candidate::query()->inRandomOrder()->first()->id,
               'category_id' => Categories::query()->forJob()->inRandomOrder()->first()->id,
           ]);
       }
        Artisan::call('cache:clear');

    }
}
