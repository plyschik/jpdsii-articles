@extends('auth.layout')

@section('content')
    <form action="{{ route('password.email') }}" method="post">
        @if (session('status'))
            <div class="callout callout-success">
                <p>{{ session('status') }}</p>
            </div>
        @endif
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.auth.remind.form.email') }}">
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block">{{ __('messages.auth.remind.form.submit') }}</button>
            </div>
        </div>
        @csrf
    </form>
@endsection