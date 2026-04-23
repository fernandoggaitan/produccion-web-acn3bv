<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('prueba', function () {

    /*
    $user = User::create([
        'name' => 'Juan',
        'email' => 'juancito@davinci.edu.ar',
        'password' => '1234'
    ]);
    */

    $user = User::find(2);

    $user->update([
        'name' => 'Joan'
    ]);

    return $user;

});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
