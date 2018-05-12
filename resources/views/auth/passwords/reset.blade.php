@extends('auth.layout')

@section('content')
    <form action="{{ route('password.update') }}" method="post">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.auth.reset.form.email') }}">
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input class="form-control" type="password" name="password" placeholder="{{ __('messages.auth.reset.form.password') }}">
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_confirmation" placeholder="{{ __('messages.auth.reset.form.password_confirmation') }}">
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block">{{ __('messages.auth.reset.form.submit') }}</button>
            </div>
        </div>
        <input type="hidden" name="token" value="{{ $token }}">
        @csrf
    </form>
@endsection