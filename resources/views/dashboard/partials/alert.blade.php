@if (session()->has('success'))
    <div class="callout callout-success">
        <h4>{{ __('messages.dashboard.alerts.headers.information') }}</h4>
        <p>{{ session()->get('success') }}</p>
    </div>
@elseif (session()->has('warning'))
    <div class="callout callout-warning">
        <h4>{{ __('messages.dashboard.alerts.headers.information') }}</h4>
        <p>{{ session()->get('warning') }}</p>
    </div>
@endif