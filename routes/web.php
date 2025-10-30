<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseWatchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cursos', [CourseController::class, 'index'])->name('cursos.index');
Route::get('/cursos/search', [CourseController::class, 'search'])->name('cursos.search');

Route::middleware('auth')->group(function () {
    Route::get('/minha-conta', [AccountController::class, 'index'])->name('account.index');
    Route::put('/minha-conta/personal-info', [AccountController::class, 'updatePersonalInfo'])->name('account.personal-info.update');
    Route::put('/minha-conta/credentials', [AccountController::class, 'updateUserCredentials'])->name('account.credentials.update');
    Route::delete('/minha-conta/delete', [AccountController::class, 'destroy'])->name('account.destroy');

    Route::get('cursos/{course}/{module}/{lesson}', [CourseWatchController::class, 'show'])->name('cursos.watch');
    Route::post('cursos/{lesson}/complete', [CourseWatchController::class, 'completeLesson'])->name('cursos.complete-lesson');
    Route::delete('cursos/{lesson}/complete', [CourseWatchController::class, 'uncompleteLesson'])->name('cursos.uncomplete-lesson');

    Route::get('/cursos/criar', [CourseController::class, 'create'])->name('cursos.create');
    Route::post('/cursos/criar', [CourseController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/edit/{course}', [CourseController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/update/{course}', [CourseController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/delete/{course}', [CourseController::class, 'destroy'])->name('cursos.destroy');

    Route::post('review/{course}', [ReviewController::class, 'store'])->name('review.store');
    Route::put('review/{course}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('review/{course}', [ReviewController::class, 'delete'])->name('review.delete');

    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/cursos/{course}', [CourseController::class, 'show'])->name('cursos.show');

Route::get('/sobre-nos', function () {
    return view('pages.sobre-nos');
})->name('sobre-nos');

Route::get('/planos', function () {
    return view('pages.planos');
})->name('planos');

Route::post('/message', [MessageController::class, 'store'])->name('message.store');
Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/registro', [RegisterController::class, 'create'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store'])->name('register.store');
});
