@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (!$articles)
                <div class="alert alert-info">
                    {{ __('messages.site.alerts.no_articles') }}
                </div>
            @else
                @foreach ($articles as $article)
                    <div class="card mb-3">
                        <div class="card-body">
                            <a href="{{ route('front.articles.show', ['id' => $article->id]) }}">
                                <h5 class="card-title">{{ $article->title }}</h5>
                            </a>
                            <p class="card-text">{{ str_limit($article->content, 256) }}</p>
                            <p class="card-text"><small class="text-muted">Artykuł dodany przez: {{ $article->user->fullName }} dnia: {{ $article->created_at }}.</small></p>
                        </div>
                    </div>
                @endforeach

                {{ $articles->links() }}
            @endif
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">Categories</div>
                <div class="list-group list-group-flush">
                    <a href="" class="list-group-item list-group-item-action">item</a>
                    <a href="" class="list-group-item list-group-item-action">item</a>
                    <a href="" class="list-group-item list-group-item-action">item</a>
                </div>
            </div>
        </div>
    </div>
@endsection