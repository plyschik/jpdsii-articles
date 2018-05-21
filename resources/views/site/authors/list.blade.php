@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (!count($articles))
                <div class="alert alert-info">
                    {{ __('messages.site.alerts.no_articles') }}
                </div>
            @else
                <h2 class="mb-3">{{ __('messages.site.headers.articles_from_user') }}: {{ $articles->first()->user->fullName }}</h2>
                @each('site.partials.article_short', $articles, 'article')
                {{ $articles->links() }}
            @endif
        </div>
        @include('site.partials.categories')
    </div>
@endsection