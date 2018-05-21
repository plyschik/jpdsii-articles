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

        @if (!count($users))
            <div class="callout callout-info">
                <h4>{{ __('messages.dashboard.users.list.callouts.nousers.header') }}</h4>

                @if (\Request::has('search'))
                    <p>{!! __('messages.dashboard.users.list.callouts.nousers.search', ['query' => request()->get('search')]) !!}. <a href="{{ route('dashboard.users.list') }}">{{ __('messages.dashboard.users.list.callouts.nousers.back') }}</a></p>
                @else
                    <p>{{ __('messages.dashboard.users.list.callouts.nousers.paragraph') }} <a href="#">{{ __('messages.dashboard.users.list.callouts.nousers.link') }}</a></p>
                @endif
            </div>
        @else
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('messages.dashboard.users.list.headers.articles_list') }}</h3>
                    <div class="box-tools">
                        <form action="" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input name="search" class="form-control pull-right" placeholder="{{ __('messages.dashboard.navbar.search') }}" type="text" value="{{ request()->get('search') }}">
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
                                <th>{{ __('messages.dashboard.users.list.table.headers.id') }}</th>
                                <th>{{ __('messages.dashboard.users.list.table.headers.email') }}</th>
                                <th>{{ __('messages.dashboard.users.list.table.headers.first_name') }}</th>
                                <th>{{ __('messages.dashboard.users.list.table.headers.last_name') }}</th>
                                <th>{{ __('messages.dashboard.users.list.table.headers.role') }}</th>
                                <th>{{ __('messages.dashboard.users.list.table.headers.created_at') }}</th>
                                <th>{{ __('messages.dashboard.users.list.table.headers.updated_at') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->roles->first()->name }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{ route('dashboard.users.edit', $user) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                    <td class="text-center">
                                        <form class="delete-form" action="{{ route('dashboard.users.delete', $user) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" @cannot('delete', $user) disabled="disabled" title="{{ __('messages.dashboard.users.delete.disabled_button_information') }}" @endcannot type="submit">
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
            {{ $users->links() }}
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
                    if (!confirm('{{ __('messages.dashboard.categories.list.alert.delete_confirm') }}')) {
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
@endsection