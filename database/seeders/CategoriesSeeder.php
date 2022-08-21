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
        Categories::create(
            [
                'name' => 'Pişirici',
                'parent_id' => null,
                'slug' => 'pisirici',
                'model' => Job::class,
                'description' => null,
                'default_cover_image' => null
            ]
        );
    }
}
