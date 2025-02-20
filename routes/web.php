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

    Route::get('company/create', [App\Http\Controllers\Web\CompanyController::class, 'create'])->name('web.company.create');
    Route::post('create_company_profile', [App\Http\Controllers\Web\CompanyController::class, 'create_company_profile'])->name('create_company_profile');
    Route::post('edit_company_profile', [App\Http\Controllers\Web\CompanyController::class, 'edit_company_profile'])->name('edit_company_profile');

    Route::get('profile/edit', [App\Http\Controllers\Web\ProfileController::class, 'edit'])->name('web.profile.edit');
    Route::post('profile/update', [App\Http\Controllers\Web\CandidateController::class, 'update'])->name('web.candidate.update');

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

// Route::get('/test-email', function () {
//     \Log::info('Test-email route hit');
//     try {
//         // Ensure the User model is imported

//         // Log the start of the process
//         \Log::info('Starting test-email process');

//         $firstUser = User::first();
        
//         if ($firstUser) {
//             \Log::info('User found: ' . $firstUser->id);
            
//             // Use a queue to send the email
//             Mail::to('info@goldbots.com')->queue(new WelcomeEmail($firstUser));
            
//             \Log::info('Email queued successfully');
//             return 'Test email queued successfully for the first user!';
//         } else {
//             \Log::warning('No users found in the database');
//             return 'No users found in the database.';
//         }
//     } catch (\Exception $e) {
//         // Log the full exception for debugging
//         \Log::error('Error in test-email: ' . $e->getMessage(), [
//             'exception' => $e,
//             'trace' => $e->getTraceAsString()
//         ]);
//         return 'Error sending email: ' . $e->getMessage();
//     }
// });
