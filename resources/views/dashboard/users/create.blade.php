@extends('dashboard.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('messages.dashboard.users.create.header') }}</h3>
                    </div>
                    <form action="{{ route('dashboard.users.create') }}" method="POST">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="emailInput">{{ __('messages.dashboard.users.create.form.email') }}</label>
                                <input class="form-control" id="emailInput" type="text" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="firstNameInput">{{ __('messages.dashboard.users.create.form.first_name') }}</label>
                                <input class="form-control" id="firstNameInput" type="text" name="first_name" value="{{ old('first_name') }}">
                                @if ($errors->has('first_name'))
                                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="lastNameInput">{{ __('messages.dashboard.users.create.form.last_name') }}</label>
                                <input class="form-control" id="lastNameInput" type="text" name="last_name" value="{{ old('last_name') }}">
                                @if ($errors->has('last_name'))
                                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="passwordInput">{{ __('messages.dashboard.users.create.form.password') }}</label>
                                <input class="form-control" id="passwordInput" type="password" name="password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirmInput">{{ __('messages.dashboard.users.create.form.password_confirm') }}</label>
                                <input class="form-control" id="passwordConfirmInput" type="password" name="password_confirmation">
                            </div>
                            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label for="category">{{ __('messages.dashboard.users.create.form.role') }}</label>
                                <select class="form-control select2" id="role_id" name="role_id">
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
                            <input class="btn btn-primary" type="submit" value="{{ __('messages.dashboard.users.create.form.submit') }}" />
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection