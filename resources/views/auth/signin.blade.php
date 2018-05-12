@extends('auth.layout')

@section('content')
    <form action="{{ route('dashboard.signin') }}" method="post">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.auth.signin.form.email') }}">
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input class="form-control" type="password" name="password" placeholder="{{ __('messages.auth.signin.form.password') }}">
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"{{ old('remember') ? ' checked' : '' }}> {{ __('messages.auth.signin.form.remember') }}
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('messages.auth.signin.form.signin') }}</button>
            </div>
        </div>
        @csrf
    </form>
    <a href="{{ route('password.request') }}">{{ __('messages.auth.signin.link.forgot') }}</a>
@endsection