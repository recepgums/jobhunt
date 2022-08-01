<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Categories;
use App\Models\CategoryUser;
use App\Models\City;
use App\Models\District;
use App\Models\Faq;
use App\Models\Gender;
use App\Models\Job;
use App\Models\Package;
use App\Models\User;
use App\Models\WorkType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *`
     * @return void
     */
    public function run()
    {
        //no foreign key needed
        Faq::factory(10)->create();
        $this->call(ReviewSeeder::class);
        Role::create(['name'=>'candidate']);
        Role::create(['name'=>'employer']);
        WorkType::create(['name' => 'Tam Zamanlı', 'type' => WorkType::TYPES['Full Time']]);
        WorkType::create(['name' => 'Yarı Zamanlı', 'type' => WorkType::TYPES['Part Time']]);
        WorkType::create(['name' => 'Karışık', 'type' => WorkType::TYPES['Hybrit']]);
        Gender::insert(['name' => 'Erkek','type' => Gender::TYPES['Erkek']]);
        Gender::insert(['name' => 'Kadın','type' => Gender::TYPES['Kadin']]);
        Package::factory(3)->create();



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
            'username' => Str::slug(fake()->name()),
            'email' => 'asd@asd.com',
            'email_verified_at' => now(),
            'password' => 'asdasdasd',
            'phone' => fake()->phoneNumber,
            'remember_token' => Str::random(10),
        ]);

        Categories::factory(50)->create();


        \App\Models\User::factory(10)->create()->each(function ($user){
            $user->assignRole('candidate');
        });
        \App\Models\User::factory(10)->create()->each(function ($user){
            $user->assignRole('employer');
        });


        Blog::factory(100)->create();
        Job::factory(1000)->create();

        CategoryUser::factory(100)->create();

        $this->call(WorkshopSeeder::class);


        Artisan::call('cache:clear');

    }
}
