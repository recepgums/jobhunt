<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BerberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseUrl = env('APP_ENV') == 'local' ? env('BASE_URL')."/" : env('APP_URL')."/";

        Categories::create([
            'name' => 'Kalfa',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/berber/1.webp'
        ]);

        Categories::create([
            'name' => 'Kalfa yardımcısı(Çırak)',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/berber/1.webp'
        ]);
        Categories::create([
            'name' => 'Manikür/Pedikürcü',
            'parent_id' => null,
            'model' => Job::class,
            'default_cover_image' => $baseUrl . 'images/category/berber/1.webp'
        ]);
    }
}
