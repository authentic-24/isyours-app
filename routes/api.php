<?php

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\JobLevelController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProficiencyLevelController;
use App\Models\CompanyProfile;
use App\Models\ProficiencyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\JobProfileController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\CandidateController;


use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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


Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('reset-password', [ResetPasswordController::class, 'reset']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::get('country/states/{country_id}', [StateController::class, 'getByCountry'])->name('api.states_by_country');
Route::resource('cities', CityController::class);
Route::get('state/cities/{state_id}', [CityController::class, 'getByState'])->name('api.cities_by_state');
Route::get('get_csrf_token', [AuthController::class, 'get_csrf_token']);
Route::get('latest/offers', [JobOfferController::class, 'get_latest_offers'])->name('get_latest_offers');

Route::middleware('auth:sanctum')->group(function () {

    Route::put('/user/{id}', [AuthController::class, 'update']);
    Route::get('/user/{id}', [AuthController::class, 'show']);
    Route::get('candidates/all', [CandidateController::class, 'index'])->name('api.candidates.index');

    //Route::resource('countries', CountryController::class);
    //Route::resource('states', StateController::class);
    //Route::resource('cities', CityController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('jobprofiles', JobProfileController::class);
    Route::resource('jobtypes', JobTypeController::class);
    Route::resource('joboffers', JobOfferController::class);
    Route::resource('joblevel', JobLevelController::class);
    Route::resource('jobtitle', JobTitleController::class);
    Route::resource('language', LanguageController::class);
    Route::resource('proficiencylevel', ProficiencyLevelController::class);
    Route::resource('educationlevels', EducationLevelController::class);
    
    Route::get('/jobprofiles/user/{user_id}', [JobProfileController::class, 'getByUser']);
    Route::post('job-offers/{job_offer_id}/apply', [JobOfferController::class, 'apply'])->name('api.job-offer.apply');

    Route::post('company_profile/store', [CompanyProfileController::class, 'store'])->name('api.company_profile.store');


    


    
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
