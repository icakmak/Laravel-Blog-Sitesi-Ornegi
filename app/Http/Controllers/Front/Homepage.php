<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Homepage extends Controller
{
    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'Desc')->get();
        $data['categories'] = Category::get();

        return view('front.homepage', $data);
    }

    public function single($slug)
    {
        $data['article'] = Article::where('slug', $slug)->first() ?? abort(404, 'Gitmek istediğiniz sayfa bulunamadı...');
        //print_r($data['article']);
        //die();
        $data['categories'] = Category::get();
        return view('front.single', $data);
    }
}
