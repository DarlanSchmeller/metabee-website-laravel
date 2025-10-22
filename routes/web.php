<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cursos', [CourseController::class, 'index'])->name('cursos.index');

Route::get('/cursos/search', [CourseController::class, 'search'])->name('cursos.search');

Route::middleware('auth')->group(function () {
    Route::get('/cursos/criar', [CourseController::class, 'create'])->name('cursos.create');
    Route::post('/cursos/criar', [CourseController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/edit/{course}', [CourseController::class, 'edit'])->name('cursos.edit');
    Route::delete('/cursos/delete/{course}', [CourseController::class, 'destroy'])->name('cursos.destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/cursos/{course}', [CourseController::class, 'show'])->name('cursos.show');

Route::get('/sobre-nos', function () {
    return view('pages.sobre-nos');
})->name('sobre-nos');

Route::get('/planos', function () {
    return view('pages.planos');
})->name('planos');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/registro', [RegisterController::class, 'create'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store'])->name('register.store');
});
