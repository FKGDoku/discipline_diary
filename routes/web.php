<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;

Route::get('/', [MainPageController::class, 'main'])->name('main');
Route::get('/insert', [MainPageController::class, 'insert'])->name('insert');
