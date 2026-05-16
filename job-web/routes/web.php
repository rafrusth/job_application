<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
//laravel default
// Route::view('/', 'welcome', [
//     'canRegister' => Features::enabled(Features::registration()),
// ])->name('home');

// Route::prefix('{current_team}')
//     ->middleware(['auth', 'verified', EnsureTeamMembership::class])
//     ->group(function () {
//         Route::view('dashboard', 'dashboard')->name('dashboard');
//     });

// Route::middleware(['auth'])->group(function () {
//     Route::livewire('invitations/{invitation}/accept', 'pages::teams.accept-invitation')->name('invitations.accept');
// });

use App\Http\Controllers\UserController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\FlashcardController;
//custom-welcome as default landing page
use App\Http\Controllers\DashboardController;
Route::get('/', [DashboardController::class, 'index'])->name('homepage');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'getProfile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit.custom');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/flashcards', [FlashcardController::class, 'index'])->name('flashcards.index');
    Route::post('/flashcards/generate', [FlashcardController::class, 'generate'])->name('flashcards.generate');
    Route::view('/cv/answers', 'answers.create')->name('cv.answers');
    Route::post('/cv/answers', [CvController::class, 'generate'])->name('cv.generate');
});

Route::view('/custom-login', 'custom-login')->name('custom.login');
Route::post('/custom-login', [UserController::class, 'login']);

Route::view('/custom-register', 'custom-register')->name('custom.register');
Route::post('/custom-register', [UserController::class, 'postRegistrationStep1'])->name('custom.register.step1');
Route::get('/custom-register/step2', [UserController::class, 'showRegistrationStep2'])->name('custom.register.step2');
Route::post('/custom-register/step2', [UserController::class, 'postRegistrationStep2'])->name('custom.register.step2.submit');


//idk
// require __DIR__.'/settings.php';
