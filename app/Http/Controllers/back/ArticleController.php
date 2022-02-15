<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'desc')->get();
        return view('back.articles.index', $data);
    }

    public function create()
    {
        $data['category'] = Category::get();
        return view('back.articles.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category;
        $article->status = $request->status;
        $article->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = Str::slug($request->title) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            //die();
            $article->image = 'uploads/' . $imageName;
        }


        $article->save();
        toastr()->success('Have fun storming the castle!', 'Miracle Max Says');
        return redirect()->route('admin.makaleler.index');
    }

    public function show($id)
    {
        $data['article'] = Article::where('id', $id)->first();
        $data['category'] = Category::get();
        return view('back.articles.show', $data);
    }

    public function edit($id)
    {
        $data['article'] = Article::where('id', $id)->first();
        $data['category'] = Category::get();
        return view('back.articles.show', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect()->route('admin.makaleler.index');
    }
}
