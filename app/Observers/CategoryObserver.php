<?php

namespace App\Observers;

use App\Models\Categories;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    /**
     * Handle the Categories "created" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function created(Categories $categories)
    {
        Cache::flush('categories');
        Cache::flush('job-categories');
        Cache::flush('job-categories-all');
    }

    /**
     * Handle the Categories "updated" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function updated(Categories $categories)
    {
        Cache::flush('categories');
        Cache::flush('job-categories');
        Cache::flush('job-categories-all');
    }

    /**
     * Handle the Categories "deleted" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function deleted(Categories $categories)
    {
        Cache::flush('categories');
        Cache::flush('job-categories');
        Cache::flush('job-categories-all');
    }

    /**
     * Handle the Categories "restored" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function restored(Categories $categories)
    {
        Cache::flush('categories');
        Cache::flush('job-categories');
        Cache::flush('job-categories-all');
    }

    /**
     * Handle the Categories "force deleted" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function forceDeleted(Categories $categories)
    {
        Cache::flush('categories');
        Cache::flush('job-categories');
    }
}
