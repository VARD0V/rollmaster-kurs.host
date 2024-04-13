<?php

use Illuminate\Support\Facades\Route;


Route::get('/main', function () {
    return view('main');
})->name('main');
