<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/cursos', function () {
    return view('pages.cursos');
})->name('cursos');

Route::get('/sobre-nos', function () {
    return view('pages.sobre-nos');
})->name('sobre-nos');

Route::get('/planos', function () {
    return view('pages.planos');
})->name('planos');