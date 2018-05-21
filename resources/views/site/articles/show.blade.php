@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @include('site.partials.article_full', ['article' => $article])
        </div>
        @include('site.partials.categories')
    </div>
@endsection