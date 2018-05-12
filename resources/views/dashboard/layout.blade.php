<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/skins/_all-skins.min.css') }}">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo">
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
                                <a href="{{ route('articles.index') }}">{{ __('messages.dashboard.navbar.mainpage') }}</a>
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
                                        <p>{{ Auth::user()->getRoleNames()->first() }}</p>
                                    </li>
                                    <!--<li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Link</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Link</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Link</a>
                                            </div>
                                        </div>
                                    </li>-->
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
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Link</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Link</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Dashboard</h1>
                </section>
                <section class="content">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Title</h3>
                        </div>
                        <div class="box-body">
                            Content
                        </div>
                        <div class="box-footer">
                            Footer
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
    </body>
</html>