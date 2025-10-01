<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('/');

Route::get('/planos', function () {
    return view('pages.planos');
})->name('planos');
