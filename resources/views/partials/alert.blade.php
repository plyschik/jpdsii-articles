@if (Session::has('success'))
    <div class="callout callout-success">
        <h4>{{ __('messages.dashboard.alerts.headers.information') }}</h4>
        <p>{{ Session::get('success') }}</p>
    </div>
@elseif (Session::has('warning'))
    <div class="callout callout-warning">
        <h4>{{ __('messages.dashboard.alerts.headers.information') }}</h4>
        <p>{{ Session::get('warning') }}</p>
    </div>
@endif