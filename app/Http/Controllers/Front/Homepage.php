<?php

namespace App\Http\Controllers\Front;

use App\Models\Pages;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;


class Homepage extends Controller
{

    public function __construct()
    {
        $data = [
            'menus' => Pages::get(),
            'articleHits' => Article::orderBy('hit', 'Desc')->limit(5)->get(),
            'categories' => Category::get()
        ];
        view()->share($data);
    }

    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'Desc')->Paginate(10)->withPath(url('yazilar/sayfa')); //Db üzerindeki yazılar çekiliyor
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...'); //request'den gelen category ifadesi db'de yok ise hata sayfasına yönlendirmek için kullanılıyor

        $data['similiars'] = Article::where('category_id', $category->id)->limit(3)->get();
        //Slugdan Gelen deger db'de aranıyor ve array'a aktarılıyor
        $data['article'] = Article::where('slug', $slug)->where('category_id', $category->id)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...');
        $data['article']->increment('hit'); //her görüntülenme sayısında hit 1 değer arttırılıyor
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->orderBy('id', 'Desc')->Paginate(10)->withPath(url('kategori/' . $slug . '/sayfa'));
        return view('front.category', $data);
    }

    public function pages($slug)
    {
        $data['page'] = Pages::where('slug', $slug)->first();
        return view('front.pages', $data);
    }


    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        //TODO: Validations işlemi için kullanılıyor
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'topic' => 'required',
            'message' => 'required|min:5'
        ];

        $validate = Validator::make($request->post(), $rules);

        if ($validate->errors()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
            print_r($validate->errors());
        }

        //? DB 'ye veri ekleme işlemi için kullanılıyor
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->topic = $request->topic;
        $contact->message = $request->message;
        $contact->save(); //Kaydetme işlemi
        return redirect()->route('contact')->with('success', 'Mesajınız Başarılı Bir Şekilde İletilmiştir...');
        //Yukarıdaki kod ilede contact sayfasına yönlendiriliyor
    }
}
