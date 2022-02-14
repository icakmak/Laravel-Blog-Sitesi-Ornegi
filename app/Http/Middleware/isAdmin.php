<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /*
        middleware ile giriş yapılmış mı kontrol otomatik kontrol ediyoruz
    */
    public function handle(Request $request, Closure $next)
    {
        //Giriş yapılmışmı diye kontrol sağlanıyor ve ! işareti ile tersi durum konrol ediliyor
        //Yani Auth işlemi yok ise return işlemi gerçekleşiyor
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
    /*
    MiddleWare tanımlandıktan sonra Http->içinde bulunan Kernel.php içinde hazırladığımız middleware dosyamızı
    tanıtmamız gerekiyor.Bu sayede Route dosyamızda middleware dosyamızı kullanabiliriz.
    */
}
