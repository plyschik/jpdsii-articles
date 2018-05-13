@extends('dashboard.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('messages.dashboard.articles.create.header') }}</h3>
                    </div>
                    <form action="{{ route('dashboard.articles.create') }}" method="POST">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="titleInput">{{ __('messages.dashboard.articles.create.form.title') }}</label>
                                <input class="form-control" id="titleInput" type="text" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="exampleInputPassword1">{{ __('messages.dashboard.articles.create.form.content') }}</label>
                                <textarea class="form-control" id="contentInput" rows="6" name="content">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            <input class="btn btn-primary" type="submit" value="{{ __('messages.dashboard.articles.create.form.submit') }}" />
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection