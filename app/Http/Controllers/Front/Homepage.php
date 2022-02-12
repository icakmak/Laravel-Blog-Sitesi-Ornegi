<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;


class Homepage extends Controller
{
    public function ortak($category = null)
    {
        $category = Category::where('slug', $category)->first();
        $veri = [
            'articleHits' => Article::orderBy('hit', 'Desc')->limit(5)->get(), // Db üzerinde en çok okunan ilk 5 yazı çekiliyor
            'categories' => Category::get(), //Db üzerinden kategoriler çekiliyor
            'menus' => Pages::get()

        ];
        return $veri;
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }

    public function index()
    {
        $veri = $this->ortak();

        $data['articles'] = Article::orderBy('id', 'Desc')->Paginate(10)->withPath(url('yazilar/sayfa')); //Db üzerindeki yazılar çekiliyor

        return view('front.homepage', $data, $veri);
    }

    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...'); //request'den gelen category ifadesi db'de yok ise hata sayfasına yönlendirmek için kullanılıyor
        $veri = $this->ortak();

        $data['similiars'] = Article::where('category_id', $category->id)->limit(3)->get();
        //Slugdan Gelen deger db'de aranıyor ve array'a aktarılıyor
        $data['article'] = Article::where('slug', $slug)->where('category_id', $category->id)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...');
        $data['article']->increment('hit'); //her görüntülenme sayısında hit 1 değer arttırılıyor

        return view('front.single', $data, $veri);
    }

    public function category($slug)
    {

        $category = Category::where('slug', $slug)->first();
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->orderBy('id', 'Desc')->Paginate(10)->withPath(url('kategori/' . $slug . '/sayfa'));
        return view('front.category', $data, $this->ortak());
    }

    public function pages($slug)
    {
        $veri = $this->ortak();
        $data = [
            'page' => Pages::where('slug', $slug)->first(),
        ];
        return view('front.pages', $data, $veri);
    }
    /*
    public function about()
    {
        $veri = $this->ortak();
        $data = [
            'page' => Pages::where('id', 1)->first(),
        ];
        return view('front.pages', $data, $veri);
    }

    public function contact()
    {
        $veri = $this->ortak();
        $data = [
            'baslik' => 'İletişim',
        ];
        return view('front.pages', $data, $veri);
    }
    public function carier()
    {
        $veri = $this->ortak();
        $data = [
            'page' => Pages::where('id', 2)->first(),
        ];
        return view('front.pages', $data, $veri);
    }*/
}
