<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Http\Requests\StoreArticle;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            Article::findOrFail($id)->delete();
        } catch (ModelNotFoundException $exception) {
            abort(404, 'Article not found.');
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }

        return back();
    }

    public function create()
    {
        return view('dashboard.articles.create');
    }

    public function store(StoreArticle $request)
    {
        $created = $request->user()->articles()->create([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);

        if (!$created) {
            abort(500, 'Article was not created.');
        }

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
        try {
            Article::findOrFail($id)->update([
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ]);
        } catch (ModelNotFoundException $exception) {
            abort(404, 'Article not found.');
        }

        return redirect()->route('dashboard.articles.list');
    }
}