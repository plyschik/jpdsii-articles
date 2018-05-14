@extends('dashboard.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('messages.dashboard.categories.edit.header') }}</h3>
                    </div>
                    <form action="{{ route('dashboard.categories.edit', ['id' => $category->id]) }}" method="POST">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="titleInput">{{ __('messages.dashboard.categories.edit.form.name') }}</label>
                                <input class="form-control" id="titleInput" type="text" name="name" value="{{ old('name', $category->name) }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            <input class="btn btn-primary" type="submit" value="{{ __('messages.dashboard.categories.edit.form.submit') }}" />
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection