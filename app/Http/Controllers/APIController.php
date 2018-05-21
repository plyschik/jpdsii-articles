<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function search(Request $request)
    {
        $articles = [];

        if ($request->get('query')) {
            $articles = Article::query()
                ->select(['id', 'title'])
                ->where('title', 'LIKE', "%{$request->get('query')}%")
                ->orderByDesc('id')
                ->limit(config('site.limits.search.articles'))
                ->get()
            ;
        }

        return response()->json($articles);
    }
}
