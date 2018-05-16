<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticlesController extends Controller
{
    public function list(Request $request)
    {
        $articles = Article::with(['user', 'category'])->orderByDesc('id');

        if (!$request->user()->hasRole('administrator')) {
            $articles->where('user_id', '=', $request->user()->id);
        }

        return view('dashboard.articles.list', [
            'articles' => $articles->paginate(10)
        ]);
    }

    public function delete(Article $article)
    {
        try {
            $this->authorize('delete', $article);
        } catch (AuthorizationException $exception) {
            return redirect()
                ->route('dashboard.articles.list')
                ->withWarning(__('messages.site.alerts.access_denied'))
                ;
        }

        try {
            $article->delete();
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }

        return back()->withSuccess(__('messages.dashboard.alerts.articles.deleted'));
    }

    public function create()
    {
        return view('dashboard.articles.create');
    }

    public function store(StoreArticle $request)
    {
        $article = new Article([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);
        $article->user()->associate($request->user());
        $article->category()->associate(Category::findOrFail($request->get('category')));
        $article->save();

        if (!$article) {
            abort(500, 'Article was not created.');
        }

        return redirect()
            ->route('dashboard.articles.list')
            ->withSuccess(__('messages.dashboard.alerts.articles.added'))
        ;
    }

    public function edit(Article $article)
    {
        try {
            $this->authorize('update', $article);
        } catch (AuthorizationException $exception) {
            return redirect()
                ->route('dashboard.articles.list')
                ->withWarning(__('messages.site.alerts.access_denied'))
            ;
        }

        return view('dashboard.articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article, StoreArticle $request)
    {
        try {
            $this->authorize('update', $article);
        } catch (AuthorizationException $exception) {
            return redirect()
                ->route('dashboard.articles.list')
                ->withWarning(__('messages.site.alerts.access_denied'))
            ;
        }

        try {
            $article->category()->associate(Category::findOrFail($request->get('category')));
            $article->update([
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ]);
        } catch (ModelNotFoundException $exception) {
            abort(404, 'Article not found.');
        }

        return redirect()
            ->route('dashboard.articles.list')
            ->withSuccess(__('messages.dashboard.alerts.articles.edited'))
        ;
    }
}