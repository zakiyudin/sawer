<?php

use App\Http\Controllers\DonationController;
use App\Livewire\DonationForm;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('user/{username}', [DonationController::class, 'index'])->name('donationform.username');
    Route::post('/donate', [DonationController::class, 'store'])->name('donation.store');
    Route::get('/donation/success', function () {
        return view('donation-success');
    })->name('donation.success');
});

require __DIR__ . '/auth.php';
