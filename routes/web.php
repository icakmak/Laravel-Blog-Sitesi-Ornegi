<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/panel', [Dashboard::class, 'index'])->name('admin.dashboard');
Route::get('/admin/giris', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/giris', [AuthController::class, 'loginPost'])->name('admin.login.post');
Route::get('/admin/cikis', [AuthController::class, 'logout'])->name('admin.logout');



/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [Homepage::class, 'index'])->name('hamepage');
Route::get('/yazilar/sayfa', [Homepage::class, 'index']);
Route::get('/iletisim', [Homepage::class, 'contact'])->name('contact');
Route::post('/iletisim', [Homepage::class, 'contactpost'])->name('contactpost');

Route::get('/kategori/{slug}', [Homepage::class, 'category'])->name('category');
Route::get('/kategori/{slug}/sayfa', [Homepage::class, 'category']);

Route::get('/{slug}', [Homepage::class, 'pages'])->name('pages');
Route::get('/{category}/{slug}', [Homepage::class, 'single'])->name('single');
