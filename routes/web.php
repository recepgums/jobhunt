<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/sitemap', [App\Http\Controllers\HomeController::class, 'sitemap'])->name('sitemap');
Route::view('contact', 'pages.contact')->name('contact');
Route::post('contactPost', [App\Http\Controllers\MailSend::class,'mailSend'])->name('contact.post');
Route::view('nasil-calisiyor', 'pages.how_it_works')->name('how_it_works');
Route::view('anlasma', 'pages.term_conditions')->name('terms');

Route::get('panel', [Controllers\CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware(['auth','employer']);
Route::get('giris', [Controllers\CustomAuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('kayit', [Controllers\CustomAuthController::class, 'register'])->name('register-user')->middleware('guest');
Route::get('telefon-dogrulama', [Controllers\CustomAuthController::class, 'phoneVerify'])->name('phone_verify')->middleware('auth');
Route::get('signout', [Controllers\CustomAuthController::class, 'signOut'])->name('signout')->middleware('auth');


Route::get('sifremi-unuttum', [Controllers\CustomAuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgotPasswordPost', [App\Http\Controllers\MailSend::class,'forgotPassword'])->name('forgotPassword.post');
Route::get('yeni-sifre-olustur/{token}', [Controllers\CustomAuthController::class, 'changePasswordByTokenIndex'])->name('password-change-token-check');
Route::post('yeni-sifre-olustur', [Controllers\CustomAuthController::class, 'changePasswordByTokenPost'])->name('password-change-post');


Route::post('custom-login', [Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-registration', [Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('telefon-dogrulama-kod', [Controllers\CustomAuthController::class, 'customPhoneVerification'])->name('phone_verify.custom');
Route::post('custom-phone-verify-code', [Controllers\CustomAuthController::class, 'customPhoneVerifyCode'])->name('phone_verify_code.custom');

Route::group(['middleware' => 'guest', 'prefix' => 'ajax'], function () {
    Route::post('login', [Controllers\CustomAuthController::class, 'customLogin'])->name('login.ajax');
    Route::post('signup', [Controllers\CustomAuthController::class, 'register'])->name('signup.ajax');
});
Route::group(['middleware' => 'auth'],function (){
    Route::post('change_password_post', [Controllers\CustomAuthController::class, 'changePasswordPost'])->name('change_password_post');
    Route::post('ajax/logout', [Controllers\CustomAuthController::class, 'signOut'])->name('logout.ajax');
});


Route::get('city/{city}/districts', [Controllers\GeneralController::class, 'getDistrictsByCity'])->name('city.districts');

Route::group(['prefix' => 'ilan/{job}', 'middleware' => 'auth', 'as' => 'job.'], function () {
    Route::get('odeme', [Controllers\JobController::class, 'payment'])->name('payment');
    Route::get('fiyatlama', [Controllers\JobController::class, 'pricing'])->name('pricing');
    Route::get('paket/{package}', [Controllers\JobController::class, 'packageSelectPost'])->name('price.post');
    Route::get('paket/{package}/api', [Controllers\JobController::class, 'packageSelectPostApi']);
    Route::post('get_contact_info', [Controllers\JobController::class, 'getContactInfo'])->name('get_contact_info');
});

Route::get('user/{user:username}', [Controllers\UserController::class, 'show'])->name('user.show');

Route::get('user/verify', [Controllers\UserVerifyController::class, 'verify'])->name('verify');

Route::post('ilan/{job}', [Controllers\JobController::class,'update'])->name('job.update');
Route::resource('ilan', Controllers\JobController::class,['names' => 'job','parameters' => ['ilan'=>'job']]);
//Route::resource('employer', Controllers\EmployerController::class);
Route::get('blog', [Controllers\BlogController::class,'index'])->name('blog.index');
Route::get('blog/{blog}', [Controllers\BlogController::class,'show'])->name('blog.show');

Route::group(['prefix' => 'panel', 'as' => 'candidate.', 'middleware' => 'auth'], function () {
    Route::get('profil', [Controllers\CandidateController::class, 'profile'])->name('profile');
    Route::get('shop_profile', [Controllers\CandidateController::class, 'shopProfile'])->name('shop_profile');
    Route::post('profile', [Controllers\CandidateController::class, 'profileUpdate'])->name('update');

    Route::get('my-resume', [Controllers\CandidateController::class, 'my_resume'])->name('my_resume');
    Route::get('ilanlarim', [Controllers\CandidateController::class, 'shortlist'])->name('shortlist');
    Route::put('jobActive{job}', [Controllers\CandidateController::class,'active'])->name('job.active');
    Route::put('jobPassive{job}', [Controllers\CandidateController::class,'passive'])->name('job.passive');
    Route::delete('job{job}', [Controllers\CandidateController::class,'destroy'])->name('job.destroy');
    Route::get('basvurulan-ilanlar', [Controllers\CandidateController::class, 'applied_jobs'])->name('applied_jobs');
    Route::get('is-alarmi', [Controllers\CandidateController::class, 'job_alert'])->name('job_alert');
    Route::get('odemeler', [Controllers\CandidateController::class, 'payments'])->name('payment');
    Route::get('cv_cover_letter', [Controllers\CandidateController::class, 'cv_cover_letter'])->name('cv_cover_letter');
    Route::get('change_password', [Controllers\CandidateController::class, 'change_password'])->name('change_password');
});

Route::get('/candidate', function () {
    return view('candidates.index');
})->name('candidates.index');

Route::post('ilan/{job}/iyzico-form-retrieve', [App\Http\Controllers\JobController::class, 'receiveIyzicoPaymentForm'])->name('omg-iyzico-form');
//Route::post('job/{job}/iyzico-form-retrieve', [App\Http\Controllers\JobController::class, 'receiveIyzicoPaymentForm'])->name('omg-iyzico-form');

Route::get('redirect/{driver}', [Controllers\UserController::class, 'socialiteRedirect'])->name('socialite.redirect');
Route::get('callback/{driver}', [Controllers\UserController::class, 'socialiteCallback'])->name('socialite.callback');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {


    Route::resource('blog', Controllers\Admin\BlogController::class);
    Route::get('/', [Controllers\Admin\AdminController::class, 'dashboard'])->name('index');
    Route::resource('faq', Controllers\Admin\FaqController::class);
    Route::get('reviews', [Controllers\Admin\AdminController::class, 'reviews'])->name('reviews');
    Route::resource('categories', Controllers\Admin\CategoriesController::class);
    Route::get('jobs', [Controllers\Admin\JobsController::class,'index'])->name('jobs.index');
    Route::get('transactions',[Controllers\Admin\TransactionsController::class,'index'])->name('transactions.index');
    Route::put('jobsActive{job}', [Controllers\Admin\JobsController::class,'active'])->name('jobs.active');
    Route::put('jobsPassive{job}', [Controllers\Admin\JobsController::class,'passive'])->name('jobs.passive');
});
Route::get('clear', function () {
    \Illuminate\Support\Facades\Artisan::command("'cache:clear'");
});

Route::get('test', function () {

    $user= auth()->user();
});
