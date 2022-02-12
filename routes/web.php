<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Homepage::class, 'index'])->name('hamepage');
Route::get('/yazilar/sayfa', [Homepage::class, 'index']);
Route::get('/kategori/{slug}', [Homepage::class, 'category'])->name('category');
Route::get('/kategori/{slug}/sayfa', [Homepage::class, 'category']);
Route::get('/{category}/{slug}', [Homepage::class, 'single'])->name('single');
Route::get('/hakkimizda', [Homepage::class, 'about'])->name('about');
Route::get('/iletisim', [Homepage::class, 'contact'])->name('contact');
