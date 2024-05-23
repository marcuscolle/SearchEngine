<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Front\FrontController::class, 'index'])->name('front.index');
Route::get('/search', [App\Http\Controllers\Front\SearchController::class, 'index'])->name('front.search');
Route::get('/search/{property:property_name}', [App\Http\Controllers\Front\SearchController::class, 'show'])->name('front.show');

