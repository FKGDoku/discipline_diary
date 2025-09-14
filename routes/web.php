<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;

Route::get('/', [MainPageController::class, 'index'])->name('index');
Route::post('/store', [MainPageController::class, 'store'])->name('store');
