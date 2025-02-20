<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});


// Auth::routes();

//  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix' => '{locale?}', 'where' => ['locale' => '(en|es)?']], function () {
    
    
    Route::prefix('web')->group(function () {
        Route::get('home', [App\Http\Controllers\Web\HomeController::class, 'home'])->name('home');
        Route::get('about', [App\Http\Controllers\Web\HomeController::class, 'about'])->name('about');
        Route::get('sitemap', [App\Http\Controllers\Web\HomeController::class, 'sitemap'])->name('sitemap');
        Route::get('login', [App\Http\Controllers\Web\HomeController::class, 'login'])->name('web_login');
        Route::get('register', [App\Http\Controllers\Web\HomeController::class, 'register'])->name('web_register');
        Route::post('register_post', [App\Http\Controllers\Web\HomeController::class, 'register_post'])->name('register_post');
        Route::post('login', [App\Http\Controllers\Web\HomeController::class, 'login_post'])->name('login_post');
        Route::get('log_out', [App\Http\Controllers\Web\HomeController::class, 'log_out'])->name('log_out');


        Route::get('offers/index', [App\Http\Controllers\Web\OfferController::class, 'index'])->name('web.offer.index');
        Route::get('offer/create', [App\Http\Controllers\Web\OfferController::class, 'create'])->name('web.offer.create');
        Route::get('offer/{id}', [App\Http\Controllers\Web\OfferController::class, 'show'])->name('web.offer.show');
        Route::post('create_post', [App\Http\Controllers\Web\OfferController::class, 'create_post'])->name('create_post');

        Route::get('apply_offer/{offer_id}', [App\Http\Controllers\Web\OfferController::class, 'apply_offer'])->name('web.offer.apply_offer');

        Route::get('candidate/index', [App\Http\Controllers\Web\CandidateController::class, 'index'])->name('web.candidate.index');

        Route::get('company/create', [App\Http\Controllers\Web\CompanyController::class, 'create'])->name('web.company.create');
        Route::post('create_company_profile', [App\Http\Controllers\Web\CompanyController::class, 'create_company_profile'])->name('create_company_profile');
        Route::post('edit_company_profile', [App\Http\Controllers\Web\CompanyController::class, 'edit_company_profile'])->name('edit_company_profile');

        Route::get('profile/edit', [App\Http\Controllers\Web\ProfileController::class, 'edit'])->name('web.profile.edit');
        Route::post('profile/update', [App\Http\Controllers\Web\CandidateController::class, 'update'])->name('web.candidate.update');



    });
// });