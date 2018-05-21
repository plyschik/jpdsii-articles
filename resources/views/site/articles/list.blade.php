@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if (!count($articles))
                <div class="alert alert-info">
                    {{ __('messages.site.alerts.no_articles') }}
                </div>
            @else
                @each('site.partials.article_short', $articles, 'article')
                {{ $articles->links() }}
            @endif
        </div>
        @include('site.partials.categories')
    </div>
@endsection