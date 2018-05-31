<?php

namespace App\Http\Controllers;

use App\Repository\ArticleRepository;

class CategoriesController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function list($id)
    {
        return view('site.categories.list', [
            'articles' => $this->articleRepository->getArticlesFromCategory($id)
        ]);
    }
}
