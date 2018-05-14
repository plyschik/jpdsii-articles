@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @include ('partials.article', ['article' => $article])
        </div>
        @include('partials.categories')
    </div>
@endsection