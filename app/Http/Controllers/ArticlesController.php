<?php

namespace App\Http\Controllers;

use App\Repository\ArticleRepository;

class ArticlesController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function list()
    {
        return view('site.articles.list', [
            'articles' => $this->articleRepository->getArticlesList()
        ]);
    }

    public function show($id)
    {
        return view('site.articles.show', [
            'article' => $this->articleRepository->getArticle($id)
        ]);
    }
}