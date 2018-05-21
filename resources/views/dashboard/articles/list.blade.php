@extends('dashboard.layout')

@section('stylesheets')
    @parent
    <style>
        .pagination {
            margin: 0 !important;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        @include('partials.alert')

        @if (!count($articles))
            <div class="callout callout-info">
                <h4>{{ __('messages.dashboard.articles.list.callouts.noarticles.header') }}</h4>

                @if (\Request::has('search'))
                    <p>{!! __('messages.dashboard.articles.list.callouts.noarticles.search', ['query' => \Request::get('search')]) !!}. <a href="{{ route('dashboard.articles.list') }}">{{ __('messages.dashboard.articles.list.callouts.noarticles.back') }}</a></p>
                @else
                    <p>{{ __('messages.dashboard.articles.list.callouts.noarticles.paragraph') }} <a href="{{ route('dashboard.articles.create') }}">{{ __('messages.dashboard.articles.list.callouts.noarticles.link') }}</a></p>
                @endif
            </div>
        @else
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('messages.dashboard.articles.list.headers.articles_list') }}</h3>
                    <div class="box-tools">
                        <form action="" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input name="search" class="form-control pull-right" placeholder="{{ __('messages.dashboard.navbar.search') }}" type="text" value="{{ \Request::get('search') }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.id') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.author') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.category') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.title') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.created_at') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.updated_at') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->user->fullName }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>{{ str_limit($article->title, 20) }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                    <td class="text-center">
                                        <form class="delete-form" action="{{ route('dashboard.articles.delete', ['id' => $article->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $articles->appends(['search' => request()->get('search')])->links() }}
        @endif
    </section>
@endsection

@section('javascripts')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var deleteButtons = document.querySelectorAll('.delete-form');

            for (var i = 0; i < deleteButtons.length; i++) {
                deleteButtons[i].addEventListener('submit', function (event) {
                    if (!confirm('{{ __('messages.dashboard.articles.list.alert.delete_confirm') }}')) {
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
@endsection