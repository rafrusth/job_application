<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::view('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

Route::middleware(['auth'])->group(function () {
    Route::livewire('invitations/{invitation}/accept', 'pages::teams.accept-invitation')->name('invitations.accept');
});

use App\Http\Controllers\UserController;
use App\Http\Controllers\CvController;

Route::view('/cv/answers', 'answers.create')->name('cv.answers');//temp
Route::post('/cv/answers', [CvController::class, 'generate'])->name('cv.generate');

Route::view('/custom-login', 'custom-login')->name('custom.login');
Route::post('/custom-login', [UserController::class, 'login']);

Route::view('/custom-register', 'custom-register')->name('custom.register');
Route::post('/custom-register', [UserController::class, 'register']);

//idk
require __DIR__.'/settings.php';
