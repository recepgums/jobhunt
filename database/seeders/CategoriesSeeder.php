<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseUrl = env('APP_ENV') == 'local' ? env('BASE_URL')."/" : env('APP_URL')."/";

        $pisirici = Categories::create([
            'name' => 'Pişirici',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/1.webp'
        ]);
        Categories::create([
            'name' => 'Odunlu Karafırın Pişiricisi',
            'parent_id' => $pisirici->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/2.webp'
        ]);
        Categories::create([
            'name' => 'Borulu Fırın Pişiricisi',
            'parent_id' => $pisirici->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/3.webp'
        ]);
        Categories::create([
            'name' => 'Taş Fırın Pişiricisi',
            'parent_id' => $pisirici->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/4.webp'
        ]);
        Categories::create([
            'name' => 'Matador Fırın Pişiricisi',
            'parent_id' => $pisirici->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/5.webp'
        ]);
        Categories::create([
            'name' => 'Döner Fırın Pişiricisi',
            'parent_id' => $pisirici->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/6.webp'
        ]);
        $hamurkar = Categories::create([
            'name' => 'Hamurkar',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/7.webp'
        ]);
        Categories::create([
            'name' => 'Ekmek Hamurkarı',
            'parent_id' => $hamurkar->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/8.webp'
        ]);
        Categories::create([
            'name' => 'Pide Hamurkarı',
            'parent_id' => $hamurkar->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/9.webp'
        ]);
        Categories::create([
            'name' => 'Ekşi Mayalı Ekmek Hamurkarı',
            'parent_id' => $hamurkar->id,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/10.webp'
        ]);
        Categories::create([
            'name' => 'Pasacı',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/11.webp'
        ]);
        Categories::create([
            'name' => 'Simit Ustası',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/12.webp'
        ]);
        Categories::create([
            'name' => 'Pastaneci',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/13.webp'
        ]);
        Categories::create([
            'name' => 'Tezgâhtar/Kasiyer',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/14.webp'
        ]);
        Categories::create([
            'name' => 'Çırak',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/15.webp'
        ]);
        Categories::create([
            'name' => 'Şoför',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/16.webp'
        ]);
    }
}
