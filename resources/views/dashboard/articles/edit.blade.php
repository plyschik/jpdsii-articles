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
                        <h3 class="box-title">{{ __('messages.dashboard.articles.edit.header') }}</h3>
                    </div>
                    <form action="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}" method="POST">
                        @method('PATCH')
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="titleInput">{{ __('messages.dashboard.articles.edit.form.title') }}</label>
                                <input class="form-control" id="titleInput" type="text" name="title" value="{{ old('title', $article->title) }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category">Kategoria:</label>
                                <select class="form-control select2" id="category" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"{{ $category->id == $article->category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="exampleInputPassword1">{{ __('messages.dashboard.articles.edit.form.content') }}</label>
                                <textarea class="form-control" id="contentInput" rows="6" name="content">{{ old('content', $article->content) }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            <input class="btn btn-primary" type="submit" value="{{ __('messages.dashboard.articles.edit.form.submit') }}" />
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
    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection