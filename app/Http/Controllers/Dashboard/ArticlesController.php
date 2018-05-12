<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticle;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function list()
    {
        $articles = Article::with('user')->orderByDesc('created_at')->paginate(10);

        return view('dashboard.articles.list', [
            'articles' => $articles
        ]);
    }

    public function delete($id)
    {
        Article::findOrFail($id)->delete();

        return back();
    }

    public function create()
    {
        return view('dashboard.articles.create');
    }

    public function store(StoreArticle $request)
    {
        $request->user()->articles()->create([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);

        return redirect()->route('dashboard.articles.list');
    }

    public function edit($id)
    {
        return view('dashboard.articles.edit', [
            'article' => Article::findOrFail($id)
        ]);
    }

    public function update(StoreArticle $request, $id)
    {
        Article::findOrFail($id)->update([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);

        return redirect()->route('dashboard.articles.list');
    }
}