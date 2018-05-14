<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap4/dist/css/bootstrap.min.css') }}">
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('front.articles.list') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ Auth::user() ? route('dashboard.articles.list') : route('dashboard.signin') }}">{{ __('messages.site.navbar.dashboard') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            @yield('content')
        </div>
        <script src="{{ asset('bower_components/jquery/dist/jquery.slim.min.js') }}"></script>
        <script src="{{ asset('bower_components/popper.js/dist/popper.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap4/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>