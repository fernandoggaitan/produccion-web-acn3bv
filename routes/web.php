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

//Acción para ver un curso por su identificación.
Route::get('courses/{course}', [
    CourseController::class,
    'show'
])->name('courses.show');

//Formulario para editar un curso existente.
Route::get('/courses/{course}/edit', [
    CourseController::class,
    'edit'
])->name('courses.edit');

//Acción para modificar un curso existente.
Route::put('/courses/{course}', [
    CourseController::class,
    'update'
])->name('courses.update');

//Acción para eliminar un curso existente.
Route::delete('/courses/{course}', [
    CourseController::class,
    'destroy'
])->name('courses.destroy');

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
