<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Job;
use App\Observers\CategoryObserver;
use App\Observers\JobObserver;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'olustur',
            'edit' => 'duzenle',
        ]);

        Job::observe(JobObserver::class);
        Categories::observe(CategoryObserver::class);
    }
}
