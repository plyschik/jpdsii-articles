<div class="col-lg-4">
    <div class="card mb-3">
        <div class="card-header">{{ __('messages.site.headers.categories') }}</div>
        @if (!count($categories))
            <div class="card-body">
                <p class="card-text">{{ __('messages.site.alerts.no_categories') }}</p>
            </div>
        @else
            <div class="list-group list-group-flush">
                @foreach ($categories as $category)
                    <a href="{{ route('site.categories.list', ['id' => $category->id]) }}" class="list-group-item list-group-item-action">{{ $category->name }} ({{ $category->articles_count }})</a>
                @endforeach
            </div>
        @endif
    </div>
</div>