<div class="card mb-3">
    <div class="card-body">
        <a href="{{ route('front.articles.show', ['id' => $article->id]) }}">
            <h5 class="card-title">{{ $article->title }}</h5>
        </a>
        <p class="card-text text-justify">{{ Str::words($article->content, 64, '...') }}</p>
        <p class="card-text">
            <small class="text-muted">
                {!! __('messages.site.footer.article', [
                    'userRoute' => route('site.authors.list', ['id' => $article->user->id]),
                    'user' => $article->user->fullName,
                    'categoryRoute' => route('site.category.list', ['id' => $article->category->id]),
                    'category' => $article->category->name,
                    'date' => $article->created_at
                ]) !!}
            </small>
        </p>
    </div>
</div>