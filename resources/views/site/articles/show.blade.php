@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ str_limit($article->content, 256) }}</p>
                    <p class="card-text"><small class="text-muted">Artykuł dodany przez: {{ $article->user->fullName }} dnia: {{ $article->created_at }}.</small></p>
                </div>
            </div>
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