<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('pages.home');
})->name('home')->middleware();

Route::get('/cursos', [CourseController::class, 'index'])->name('cursos.index');

Route::get('/cursos/search', [CourseController::class, 'search'])->name('cursos.search');

Route::get('/cursos/{curso}', [CourseController::class, 'show'])->name('cursos.show');

Route::get('/sobre-nos', function () {
    return view('pages.sobre-nos');
})->name('sobre-nos');

Route::get('/planos', function () {
    return view('pages.planos');
})->name('planos');


Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/create-account', [LoginController::class, 'index'])->name('create-account');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
