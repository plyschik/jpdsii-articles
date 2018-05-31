<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ArticleRepository;

class APIController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function search(Request $request)
    {
        if ($request->get('query')) {
            $articles = $this->articleRepository->getArticlesFromSearch($request->get('search'));
        }

        return response()->json($articles ?? []);
    }
}
