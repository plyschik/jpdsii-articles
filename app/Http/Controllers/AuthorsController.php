<?php

namespace App\Http\Controllers;

use App\Repository\ArticleRepository;

class AuthorsController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function list($id)
    {
        return view('site.authors.list', [
            'articles' => $this->articleRepository->getArticlesFromAuthor($id)
        ]);
    }
}
