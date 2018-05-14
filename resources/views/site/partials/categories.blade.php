<div class="col-lg-4">
    <div class="card mb-3">
        <div class="card-header">{{ __('messages.site.headers.categories') }}</div>
        <div class="list-group list-group-flush">
            @foreach ($categories as $category)
                <a href="{{ route('site.category.list', ['id' => $category->id]) }}" class="list-group-item list-group-item-action">{{ $category->name }} ({{ $category->articles_count }})</a>
            @endforeach
        </div>
    </div>
</div>