<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Lista de cursos.
Route::get('courses', [
    CourseController::class,
    'index'
])->name('courses.index');

//Formulario para agregar un curso nuevo.
Route::get('/courses/create', [
    CourseController::class,
    'create'
])->name('courses.create');

//Acción para crear un curso nuevo.
Route::post('courses', [
    CourseController::class,
    'store'
])->name('courses.store');

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
