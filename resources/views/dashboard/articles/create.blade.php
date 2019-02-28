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
                        <h3 class="box-title">{{ __('messages.dashboard.articles.create.header') }}</h3>
                    </div>
                    <form id="dashboard_article_create" action="{{ route('dashboard.articles.create') }}" method="POST">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">{{ __('messages.dashboard.articles.create.form.title') }}</label>
                                <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category">Kategoria:</label>
                                <select class="form-control select2" id="category" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content">{{ __('messages.dashboard.articles.create.form.content') }}</label>
                                <textarea class="form-control" id="content" name="content" rows="6">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">{{ __('messages.dashboard.articles.create.form.submit') }}</button>
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
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.validator.addMethod("exists_in_array", function(value, element, parameter) {
                return $.inArray(parseInt(value), parameter) > -1;
            }, 'Please enter a valid value from array.');

            $('#dashboard_article_create').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 8,
                        maxlength: 128
                    },
                    category_id: {
                        required: true,
                        exists_in_array: JSON.parse('{{ json_encode($categories->pluck('id')) }}')
                    },
                    content: {
                        required: true,
                        minlength: 8,
                        maxlength: 65535
                    },
                },
                messages: {
                    title: {
                        required: '{{ __('validation.custom.title.required') }}',
                        minlength: '{{ __('validation.custom.title.min', ['min' => 8]) }}',
                        maxlength: '{{ __('validation.custom.title.max', ['max' => 128]) }}'
                    },
                    category_id: {
                        exists_in_array: '{{ __('validation.custom.category.exists') }}'
                    },
                    content: {
                        required: '{{ __('validation.custom.content.required') }}',
                        minlength: '{{ __('validation.custom.content.min', ['min' => 8]) }}',
                        maxlength: '{{ __('validation.custom.content.max', ['max' => 65535]) }}'
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