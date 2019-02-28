<?php

namespace App\Http\Controllers;

use App\User;
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
        $qb = Category::where('name', $request->get('name'));

        return response()->json($qb->doesntExist());
    }

    public function userEmailUniqueCheck(Request $request): JsonResponse
    {
        $qb = User::where('email', $request->get('email'));

        if ($request->has('user_id')) {
            $qb->where('id', '<>', $request->get('user_id'));
        }

        return response()->json($qb->doesntExist());
    }
}