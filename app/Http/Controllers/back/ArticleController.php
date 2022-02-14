<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'desc')->get();
        return view('back.articles.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data['article'] = Article::where('id', $id)->first();
        $data['category'] = Category::get();
        return view('back.articles.show', $data);
    }

    public function edit($id)
    {
        return $id;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
