<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @section('stylesheets')
            <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @show
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="{{ route('dashboard.articles.list') }}" class="logo">
                    <span class="logo-mini"></span>
                    <span class="logo-lg"><b>JPDSII</b> Articles</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('site.articles.list') }}">{{ __('messages.dashboard.navbar.mainpage') }}</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ strtoupper(app()->getLocale()) }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="{{ app()->getLocale() == 'pl' ? 'disabled' : '' }}"><a href="{{ route('site.locale', ['locale' => 'pl']) }}">PL</a></li>
                                    <li class="{{ app()->getLocale() == 'en' ? 'disabled' : '' }}"><a href="{{ route('site.locale', ['locale' => 'en']) }}">EN</a></li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('images/noavatar.png') }}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ Auth::user()->fullName }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ asset('images/noavatar.png') }}" class="img-circle" alt="User Image">
                                        <p>{{ Auth::user()->fullName }}</p>
                                        <p>
                                            <i>{{ Auth::user()->getRoleNames()->first() }}</i>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <form action="{{ route('dashboard.signout') }}" method="POST">
                                                <input class="btn btn-default btn-flat" type="submit" value="{{ __('messages.dashboard.navbar.signout') }}" />
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="treeview{{ \Route::is('dashboard.articles.*') ? ' active' : '' }}">
                            <a href="#">
                                <i class="fa fa-th"></i> <span>{{ __('messages.dashboard.menu.articles.header') }}</span>
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('dashboard.articles.list') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.articles.list') }}</a></li>
                                <li><a href="{{ route('dashboard.articles.create') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.articles.add') }}</a></li>
                            </ul>
                        </li>
                        @role('administrator')
                            <li class="treeview{{ \Route::is('dashboard.categories.*') ? ' active' : '' }}">
                                <a href="#">
                                    <i class="fa fa-th"></i> <span>{{ __('messages.dashboard.menu.categories.header') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('dashboard.categories.list') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.categories.list') }}</a></li>
                                    <li><a href="{{ route('dashboard.categories.create') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.categories.add') }}</a></li>
                                </ul>
                            </li>
                            <li class="treeview{{ \Route::is('dashboard.users.*') ? ' active' : '' }}">
                                <a href="#">
                                    <i class="fa fa-th"></i> <span>{{ __('messages.dashboard.menu.users.header') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('dashboard.users.list') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.users.list') }}</a></li>
                                    <li><a href="{{ route('dashboard.users.create') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.users.add') }}</a></li>
                                </ul>
                            </li>
                            <li class="treeview{{ \Route::is('dashboard.stats.*') ? ' active' : '' }}">
                                <a href="#">
                                    <i class="fa fa-th"></i> <span>{{ __('messages.dashboard.menu.stats.header') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('dashboard.stats.live') }}"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.stats.live') }}</a></li>
                                    <li><a href="{{ route('dashboard.stats.report') }}" target="_blank"><i class="fa fa-circle-o"></i> {{ __('messages.dashboard.menu.stats.report') }}</a></li>
                                </ul>
                            </li>
                        @endrole
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
        @section('javascripts')
            <script src="{{ asset('js/dashboard.js') }}"></script>
        @show
    </body>
</html>