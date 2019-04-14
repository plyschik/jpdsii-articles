<?php

namespace App\Repository;

use App\Article;

class ArticleRepository
{
    protected $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function getArticle(int $id)
    {
        return $this->model
            ->select(['user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->where('id', $id)
            ->firstOrFail();
    }

    public function getArticlesFromSearch(string $query)
    {
        return $this->model
            ->select(['id', 'title'])
            ->where('title', 'LIKE', "%{$query}%")
            ->orderByDesc('id')
            ->limit(config('site.limits.search.articles'))
            ->get();
    }

    public function getArticlesList()
    {
        return $this->model
            ->select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->latest('id')
            ->paginate(config('site.limits.articles'));
    }

    public function getArticlesFromCategory(int $id)
    {
        return $this->model
            ->select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->where('category_id', $id)
            ->latest('id')
            ->paginate(config('site.limits.articles'));
    }

    public function getArticlesFromAuthor(int $id)
    {
        return $this->model
            ->select(['id', 'user_id', 'category_id', 'title', 'content', 'created_at'])
            ->with(['user:id,first_name,last_name', 'category:id,name'])
            ->where('user_id', $id)
            ->latest('id')
            ->paginate(config('site.limits.articles'));
    }
}