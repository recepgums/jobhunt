<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('how-it-works', 'pages.how_it_works')->name('how_it_works');
Route::view('terms', 'pages.term_conditions')->name('terms');

Route::get('dashboard', [Controllers\CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('login', [Controllers\CustomAuthController::class, 'index'])->name('login');
Route::get('register', [Controllers\CustomAuthController::class, 'register'])->name('register-user');
Route::get('signout', [Controllers\CustomAuthController::class, 'signOut'])->name('signout');

Route::post('custom-login', [Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-registration', [Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('change_password_post', [Controllers\CustomAuthController::class, 'changePasswordPost'])->name('change_password_post');

Route::group(['middleware' => 'guest', 'prefix' => 'ajax'], function () {
    Route::post('login', [Controllers\CustomAuthController::class, 'customLogin'])->name('login.ajax');
    Route::post('signup', [Controllers\CustomAuthController::class, 'register'])->name('signup.ajax');
    Route::post('logout', [Controllers\CustomAuthController::class, 'signOut'])->name('logout.ajax');
});

Route::get('city/{city}/districts', [Controllers\GeneralController::class, 'getDistrictsByCity'])->name('city.districts');

Route::group(['prefix' => 'job/{job}', 'middleware' => 'auth', 'as' => 'job.'], function () {
    Route::get('payment', [Controllers\JobController::class, 'payment'])->name('payment');
    Route::get('pricing', [Controllers\JobController::class, 'pricing'])->name('pricing');
    Route::get('package/{package}', [Controllers\JobController::class, 'packageSelectPost'])->name('price.post');

    Route::post('get_contact_info', [Controllers\JobController::class, 'getContactInfo'])->name('get_contact_info');
});

Route::get('user/{user:username}',[Controllers\UserController::class,'show'])->name('user.show');

Route::get('user/verify',[Controllers\UserVerifyController::class,'verify'])->name('verify');

Route::resource('job', Controllers\JobController::class);
Route::resource('employer', Controllers\EmployerController::class);
Route::resource('blog', Controllers\BlogController::class);

Route::group(['prefix' => 'candidate', 'as' => 'candidate.', 'middleware' => 'auth'], function () {
    Route::get('profile', [Controllers\CandidateController::class, 'profile'])->name('profile');
    Route::post('profile', [Controllers\CandidateController::class, 'profileUpdate'])->name('update');

    Route::get('my-resume', [Controllers\CandidateController::class, 'my_resume'])->name('my_resume');
    Route::get('shortlist', [Controllers\CandidateController::class, 'shortlist'])->name('shortlist');
    Route::get('applied_jobs', [Controllers\CandidateController::class, 'applied_jobs'])->name('applied_jobs');
    Route::get('job_alert', [Controllers\CandidateController::class, 'job_alert'])->name('job_alert');
    Route::get('cv_cover_letter', [Controllers\CandidateController::class, 'cv_cover_letter'])->name('cv_cover_letter');
    Route::get('change_password', [Controllers\CandidateController::class, 'change_password'])->name('change_password');
});

Route::get('/candidate', function () {
    return view('candidates.index');
})->name('candidates.index');

Route::post('job/{job}/iyzico-form-retrieve', [App\Http\Controllers\JobController::class, 'receiveIyzicoPaymentForm'])->name('omg-iyzico-form');
//Route::post('job/{job}/iyzico-form-retrieve', [App\Http\Controllers\JobController::class, 'receiveIyzicoPaymentForm'])->name('omg-iyzico-form');

Route::get('redirect/{driver}', [Controllers\UserController::class, 'socialiteRedirect'])->name('socialite.redirect');
Route::get('callback/{driver}', [Controllers\UserController::class, 'socialiteCallback'])->name('socialite.callback');

Route::get('test', function () {

    return view('admin.dashboard');
});
