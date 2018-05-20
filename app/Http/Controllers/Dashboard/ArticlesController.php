<?php

namespace App\Http\Controllers\Dashboard;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticlesController extends Controller
{
    public function create()
    {
        return view('dashboard.articles.create');
    }

    public function store(StoreArticle $request)
    {
        try {
            $category = Category::findOrFail($request->get('category'));
        } catch (ModelNotFoundException $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        $article = new Article([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);
        $article->user()->associate($request->user());
        $article->category()->associate($category);
        $article->save();

        if (!$article) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.articles.list')
            ->with('success', __('messages.dashboard.alerts.articles.added'))
        ;
    }

    public function list(Request $request)
    {
        $articles = Article::with(['user', 'category'])->latest('id');

        if (!$request->user()->hasRole('administrator')) {
            $articles->where('user_id', $request->user()->id);
        }

        if ($request->has('search')) {
            $search = $request->get('search');

            $articles
                ->where('title', 'LIKE', "{$search}%")
                ->orWhere('content', 'LIKE', "{$search}%")
            ;
        }

        return view('dashboard.articles.list', [
            'articles' => $articles->paginate(10)
        ]);
    }

    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', compact('article'));
    }

    public function update(Article $article, StoreArticle $request)
    {
        try {
            $category = Category::findOrFail($request->get('category'));
        } catch (ModelNotFoundException $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        try {
            $article->category()->associate($category);
            $article->update([
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ]);
        } catch (ModelNotFoundException $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return redirect()
            ->route('dashboard.articles.list')
            ->with('success', __('messages.dashboard.alerts.articles.edited'))
        ;
    }

    public function delete(Article $article)
    {
        try {
            $article->delete();
        } catch (\Exception $exception) {
            return back()->with('warning', __('messages.site.alerts.something_went_wrong'));
        }

        return back()->with('success', __('messages.dashboard.alerts.articles.deleted'));
    }
}