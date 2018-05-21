<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text text-justify">{{ $article->content }}</p>
        <p class="card-text">
            <small class="text-muted">
                {!! __('messages.site.footer.article', [
                    'userRoute' => route('site.authors.list', ['id' => $article->user->id]),
                    'user' => $article->user->fullName,
                    'categoryRoute' => route('site.categories.list', ['id' => $article->category->id]),
                    'category' => $article->category->name,
                    'date' => $article->created_at
                ]) !!}
            </small>
        </p>
    </div>
</div>