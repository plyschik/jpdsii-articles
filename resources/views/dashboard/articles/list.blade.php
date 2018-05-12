@extends('dashboard.layout')

@section('content')
    <section class="content">
        @if (!$articles)
            <div class="callout callout-info">
                <h4>{{ __('messages.dashboard.articles.list.callouts.noarticles.header') }}</h4>
                <p>{{ __('messages.dashboard.articles.list.callouts.noarticles.paragraph') }} <a href="#">{{ __('messages.dashboard.articles.list.callouts.noarticles.link') }}</a></p>
            </div>
        @else
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('messages.dashboard.articles.list.headers.articles_list') }}</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.id') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.author') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.title') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.created_at') }}</th>
                                <th>{{ __('messages.dashboard.articles.list.table.headers.updated_at') }}</th>
                                <th></th>
                            </tr>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->user->fullName }}</td>
                                    <td>{{ str_limit($article->title, 32) }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->updated_at }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="#">{{ __('messages.dashboard.articles.list.table.actions.edit') }}</a>
                                        <a class="btn btn-danger" href="#">{{ __('messages.dashboard.articles.list.table.actions.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $articles->links() }}
        @endif
    </section>
@endsection