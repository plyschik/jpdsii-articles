@extends('site.layout')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text text-justify">{{ $article->content }}</p>
                    <p class="card-text"><small class="text-muted">Artykuł dodany przez: {{ $article->user->fullName }} dnia: {{ $article->created_at }} w kategorii: {{ $article->category->name }}.</small></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">Categories</div>
                <div class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <a href="#" class="list-group-item list-group-item-action">{{ $category->name }} ({{ $category->articles_count }})</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection