<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;

/*
|--------------------------------------------------------------------------
| Backend Routes
| siteAdresi.com/admin/.... şeklinde tanımlama yapıldığı için prefix ile grouplama yapılıyor
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(
    function () {
        Route::get('giris', [AuthController::class, 'login'])->name('login');
        Route::post('giris', [AuthController::class, 'loginPost'])->name('login.post');
    }
);

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('panel', [Dashboard::class, 'index'])->name('dashboard');

    Route::resource('makaleler', ArticleController::class);
    //Route::resource('makaleler', 'back\ArticleController');

    Route::get('cikis', [AuthController::class, 'logout'])->name('logout');
});




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
