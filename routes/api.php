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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('city',[Controllers\PublicDataController::class,'city']);
Route::get('category/{category}/sub-category',[Controllers\PublicDataController::class,'subCategory']);
Route::get('job-categories',[Controllers\PublicDataController::class,'jobCategories']);

Route::get('city/{city}/district',[Controllers\PublicDataController::class,'district']);
Route::post('job',[Controllers\JobController::class,'store']);
