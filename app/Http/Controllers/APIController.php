<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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

    public function categoryNameUniqueCheck(Request $request): JsonResponse
    {
        if (Category::where('name', $request->get('name'))->exists()) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }
}