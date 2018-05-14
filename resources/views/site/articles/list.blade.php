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
                            <p class="card-text text-justify">{{ Str::words($article->content, 64, '...') }}</p>
                            <p class="card-text"><small class="text-muted">Artykuł dodany przez: {{ $article->user->fullName }} dnia: {{ $article->created_at }} w kategorii: {{ $article->category->name }}.</small></p>
                        </div>
                    </div>
                @endforeach

                {{ $articles->links() }}
            @endif
        </div>
        @include('partials.categories')
    </div>
@endsection