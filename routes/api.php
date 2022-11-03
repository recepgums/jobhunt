<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('city', [Controllers\PublicDataController::class, 'city']);
Route::get('category/{category}/sub-category', [Controllers\PublicDataController::class, 'subCategory']);
Route::get('job-categories', [Controllers\PublicDataController::class, 'jobCategories']);

Route::get('job-create-data', [Controllers\PublicDataController::class, 'jobCreateData']);
Route::get('homepageDatas', [Controllers\PublicDataController::class, 'homepageDatas']);

Route::get('city/{city}/district', [Controllers\PublicDataController::class, 'district']);
Route::get('job-v1', [Controllers\JobController::class, 'indexAjax'])->name('job.ajax');
Route::get('job/{job}', [Controllers\JobController::class, 'showAjax'])->name('job.ajax.show');
