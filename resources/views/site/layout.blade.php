<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/site.css') }}">
        @if (request()->cookies->has('theme'))
            <link rel="stylesheet" href="{{ asset('css/' . request()->cookie('theme') . '.css') }}">
        @endif
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('site.articles.list') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <form class="form-inline ml-auto w-50">
                        <div class="typeahead__container w-100">
                            <div class="typeahead__field">
                                <span class="typeahead__query">
                                    <input class="form-control w-100 typeahead-search" placeholder="{{ __('messages.site.navbar.search') }}" autocomplete="off" type="search">
                                </span>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            @if (auth()->user())
                                <a class="nav-link" href="{{ route('dashboard.articles.list') }}">{{ __('messages.site.navbar.dashboard') }}</a>
                            @else
                                <a class="nav-link" href="{{ route('dashboard.signin') }}">{{ __('messages.site.navbar.signin') }}</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            @if (session()->has('alert'))
                <div class="alert alert-danger">
                    {{ session()->get('alert') }}
                </div>
            @endif
            @yield('content')
        </div>
        <div class="p-3 bg-dark text-white">
            <div class="container d-flex justify-content-between align-items-center">
                <span>Copyright &copy; 2019</span>
                <form class="form-inline" method="POST" action="{{ route('site.theme') }}">
                    <select class="form-control" name="theme" onchange="this.form.submit();">
                        @foreach (['default', 'darkly', 'solar'] as $theme)
                            <option value="{{ $theme }}" @if (request()->cookie('theme') === $theme) selected="selected" @endif>{{ ucfirst($theme) }}</option>
                        @endforeach
                    </select>
                    @csrf
                </form>
            </div>
        </div>
        <script src="{{ asset('js/site.js') }}"></script>
    </body>
</html>