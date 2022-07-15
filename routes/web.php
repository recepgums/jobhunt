<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('how-it-works', 'pages.how_it_works')->name('how_it_works');
Route::view('terms', 'pages.term_conditions')->name('terms');

Route::get('dashboard', [Controllers\CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('login', [Controllers\CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [Controllers\CustomAuthController::class, 'register'])->name('register-user');
Route::post('custom-registration', [Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [Controllers\CustomAuthController::class, 'signOut'])->name('signout');
Route::post('change_password_post',[Controllers\CustomAuthController::class,'changePasswordPost'])->name('change_password_post');

Route::group(['middleware' => 'guest', 'prefix' => 'ajax'], function () {
    Route::post('login', [Controllers\CustomAuthController::class, 'login'])->name('login.ajax');
    Route::post('signup', [Controllers\CustomAuthController::class, 'register'])->name('signup.ajax');
    Route::post('logout', [Controllers\CustomAuthController::class, 'signOut'])->name('logout.ajax');
});

Route::get('city/{city}/districts',[Controllers\GeneralController::class,'getDistrictsByCity'])->name('city.districts');

Route::group(['prefix' => 'job/{job}','middleware' => 'auth','as'=>'job.'],function (){
    Route::get('payment', [Controllers\JobController::class,'payment'])->name('payment');
    Route::get('pricing', [Controllers\JobController::class,'pricing'])->name('pricing');
    Route::get('package/{package}', [Controllers\JobController::class,'packageSelectPost'])->name('price.post');

    Route::post('get_contact_info',[Controllers\JobController::class,'getContactInfo'])->name('get_contact_info');
});

Route::resource('job', Controllers\JobController::class);
Route::resource('employer', Controllers\EmployerController::class);
Route::resource('blog', Controllers\BlogController::class);

Route::group(['prefix'=>'candidate','as'=>'candidate.'],function (){
   Route::get('profile',[Controllers\CandidateController::class,'profile'])->name('profile');
    Route::get('my-resume',[Controllers\CandidateController::class,'my_resume'])->name('my_resume');
    Route::get('shortlist',[Controllers\CandidateController::class,'shortlist'])->name('shortlist');
    Route::get('applied_jobs',[Controllers\CandidateController::class,'applied_jobs'])->name('applied_jobs');
    Route::get('job_alert',[Controllers\CandidateController::class,'job_alert'])->name('job_alert');
    Route::get('cv_cover_letter',[Controllers\CandidateController::class,'cv_cover_letter'])->name('cv_cover_letter');
    Route::get('change_password',[Controllers\CandidateController::class,'change_password'])->name('change_password');
});

Route::get('/candidate', function () {
    return view('candidates.index');
})->name('candidates.index');


Route::get('test',function (){
});
Route::post('/iyzico-form-retrieve', [App\Http\Controllers\JobController::class, 'receiveIyzicoPaymentForm'])->name('omg-iyzico-form');
//Route::post('job/{job}/iyzico-form-retrieve', [App\Http\Controllers\JobController::class, 'receiveIyzicoPaymentForm'])->name('omg-iyzico-form');
