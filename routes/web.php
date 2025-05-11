<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('layouts.master');
});

Route::resource('categories', CategoryController::class);
