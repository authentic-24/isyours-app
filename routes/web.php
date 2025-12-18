<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

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

// Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});

// Language switcher route
Route::get('language/{locale}', [App\Http\Controllers\LanguageController::class, 'changeLocale'])->name('language.switch');

// Test locale route
Route::get('/test-locale', function () {
    $locale = app()->getLocale();
    $sessionLocale = session('locale');

    app()->setLocale('es');
    $testEs = __('home.login_welcome_back');

    app()->setLocale('en');
    $testEn = __('home.login_welcome_back');

    return response()->json([
        'current_locale' => $locale,
        'session_locale' => $sessionLocale,
        'spanish_test' => $testEs,
        'english_test' => $testEn,
        'lang_path' => lang_path(),
        'es_file_exists' => file_exists(lang_path('es/home.php')),
        'en_file_exists' => file_exists(lang_path('en/home.php')),
    ]);
});

Route::prefix('web')->group(function () {
    Route::get('home', [App\Http\Controllers\Web\HomeController::class, 'home'])
        ->name('home')
        ->middleware('web');

    // Keep this route as is
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
    Route::get('candidate/{id}/profile', [App\Http\Controllers\Web\CandidateController::class, 'show'])->name('web.candidate.show');
    Route::get('candidate/my-applications', [App\Http\Controllers\Web\CandidateController::class, 'myApplications'])->name('web.candidate.my_applications');

    Route::get('company/create', [App\Http\Controllers\Web\CompanyController::class, 'create'])->name('web.company.create');
    Route::post('create_company_profile', [App\Http\Controllers\Web\CompanyController::class, 'create_company_profile'])->name('create_company_profile');
    Route::post('edit_company_profile', [App\Http\Controllers\Web\CompanyController::class, 'edit_company_profile'])->name('edit_company_profile');

    Route::get('profile/edit', [App\Http\Controllers\Web\ProfileController::class, 'edit'])->name('web.profile.edit');
    Route::post('profile/update', [App\Http\Controllers\Web\CandidateController::class, 'update'])->name('web.candidate.update');
    Route::get('profile/change-password', [App\Http\Controllers\Web\ProfileController::class, 'changePasswordForm'])->name('web.profile.change_password');
    Route::post('profile/update-password', [App\Http\Controllers\Web\ProfileController::class, 'updatePassword'])->name('web.profile.update_password');

    // Work Experience Routes
    Route::post('profile/work-experience', [App\Http\Controllers\Web\ProfileController::class, 'storeWorkExperience'])->name('web.profile.work_experience.store');
    Route::put('profile/work-experience/{id}', [App\Http\Controllers\Web\ProfileController::class, 'updateWorkExperience'])->name('web.profile.work_experience.update');
    Route::delete('profile/work-experience/{id}', [App\Http\Controllers\Web\ProfileController::class, 'destroyWorkExperience'])->name('web.profile.work_experience.destroy');

    // Talents Routes
    Route::post('profile/talent', [App\Http\Controllers\Web\ProfileController::class, 'storeTalent'])->name('web.profile.talent.store');
    Route::delete('profile/talent/{id}', [App\Http\Controllers\Web\ProfileController::class, 'destroyTalent'])->name('web.profile.talent.destroy');

    Route::get('test-web', function () {
        return 'Test Web Route';
    });
});

// Move this route outside of the 'web' prefix group
Route::get('/test', function () {
    return 'Hello, World!';
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::middleware('auth')->get('/test-email', function () {
    \Log::info('Test-authemail route hit');
    $currentUser = auth()->user();
    if ($currentUser) {
        try {
            // Log the start of the process
            \Log::info('Starting test-email process');
            // Use a queue to send the email
            Mail::to('info@goldbots.com')->queue(new WelcomeEmail($currentUser));

            \Log::info('Email queued successfully');
            return 'Test email sent successfully!';
        } catch (\Exception $e) {
            \Log::error('Error in test-email: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return 'Error sending email: ' . $e->getMessage();
        }
    } else {
        \Log::warning('No users authenticated');
        return 'User not authenticated';
    }
});

Route::post('/job-post', [App\Http\Controllers\JobOfferController::class, 'store'])->name('job.post');
Route::get('/job-post', [App\Http\Controllers\JobOfferController::class, 'create'])->name('job.create');
