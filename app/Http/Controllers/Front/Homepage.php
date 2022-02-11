<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Homepage extends Controller
{
    public function ortak()
    {
        $veri = [
            'hits' => Article::orderBy('hit', 'Desc')->limit(5)->get(), // Db üzerinde en çok okunan ilk 5 yazı çekiliyor
            'category' => Category::get() //Db üzerinden kategoriler çekiliyor
        ];
        return $veri;
    }


    public function index()
    {
        $veri = $this->ortak();
        $data['articleHits'] = $veri['hits'];
        $data['categories'] = $veri['category'];
        $data['articles'] = Article::orderBy('id', 'Desc')->get(); //Db üzerindeki yazılar çekiliyor
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...'); //request'den gelen category ifadesi db'de yok ise hata sayfasına yönlendirmek için kullanılıyor
        $veri = $this->ortak();
        $data['articleHits'] = $veri['hits'];
        $data['categories'] = $veri['category'];
        //Slugdan Gelen deger db'de aranıyor ve array'a aktarılıyor
        $data['article'] = Article::where('slug', $slug)->where('category_id', $category->id)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...');
        $data['article']->increment('hit'); //her görüntülenme sayısında hit 1 değer arttırılıyor

        return view('front.single', $data);
    }
}
