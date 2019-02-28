@extends('dashboard.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    @parent
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('messages.dashboard.users.create.header') }}</h3>
                    </div>
                    <form id="dashboard_user_create" action="{{ route('dashboard.users.create') }}" method="POST">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">{{ __('messages.dashboard.users.create.form.email') }}</label>
                                <input class="form-control" id="email" type="text" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name">{{ __('messages.dashboard.users.create.form.first_name') }}</label>
                                <input class="form-control" id="first_name" type="text" name="first_name" value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name">{{ __('messages.dashboard.users.create.form.last_name') }}</label>
                                <input class="form-control" id="last_name" type="text" name="last_name" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">{{ __('messages.dashboard.users.create.form.password') }}</label>
                                <input class="form-control" id="password" type="password" name="password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">{{ __('messages.dashboard.users.create.form.password_confirm') }}</label>
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation">
                            </div>
                            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label for="role_id">{{ __('messages.dashboard.users.create.form.role') }}</label>
                                <select class="form-control" id="role_id" name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ request()->get('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                    @if ($errors->has('role_id'))
                                        <span class="help-block">{{ $errors->first('role_id') }}</span>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">{{ __('messages.dashboard.users.create.form.submit') }}</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    @parent
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer {{ Auth::user()->api_token }}'
                }
            });

            $.validator.addMethod("exists_in_array", function(value, element, parameter) {
                return $.inArray(parseInt(value), parameter) > -1;
            }, 'Please enter a valid value from array.');

            $('#dashboard_user_create').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            method: 'POST',
                            url: '/api/users/exists'
                        }
                    },
                    first_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 32
                    },
                    last_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 32
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        equalTo: '#password'
                    },
                    role_id: {
                        required: true,
                        exists_in_array: JSON.parse('@json($roles->pluck('id'))')
                    }
                },
                messages: {
                    email: {
                        required: '{{ __('validation.custom.email.required') }}',
                        email: '{{ __('validation.custom.email.format') }}',
                        remote: '{{ __('validation.custom.email.unique') }}'
                    },
                    first_name: {
                        required: '{{ __('validation.custom.first_name.required') }}',
                        minlength: '{{ __('validation.custom.first_name.min', ['min' => 2]) }}',
                        maxlength: '{{ __('validation.custom.first_name.max', ['max' => 32]) }}'
                    },
                    last_name: {
                        required: '{{ __('validation.custom.content.required') }}',
                        minlength: '{{ __('validation.custom.content.min', ['min' => 2]) }}',
                        maxlength: '{{ __('validation.custom.content.max', ['max' => 32]) }}'
                    },
                    password: {
                        required: '{{ __('validation.custom.password.required') }}',
                        minlength: '{{ __('validation.custom.password.min', ['min' => 6]) }}'
                    },
                    password_confirmation: {
                        equalTo: '{{ __('validation.custom.password.equals') }}'
                    },
                    role_id: {
                        exists_in_array: '{{ __('validation.custom.role.exists') }}'
                    }
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.addClass("help-block");
                    error.insertAfter(element);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parent().addClass("has-error");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parent().removeClass("has-error");
                }
            });
        });
    </script>
@endsection