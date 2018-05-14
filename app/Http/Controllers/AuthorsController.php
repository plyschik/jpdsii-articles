<?php

namespace App\Http\Controllers;

use App\Article;

class AuthorsController extends Controller
{
    public function listOfArticlesOfAuthor($authorId)
    {
        return view('site.authors.list', [
            'articles' => Article::with(['user', 'category'])->where('user_id', '=', $authorId)->orderByDesc('id')->paginate(10)
        ]);
    }
}
