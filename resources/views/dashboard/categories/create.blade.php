@extends('dashboard.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('messages.dashboard.categories.create.header') }}</h3>
                    </div>
                    <form id="dashboard_category_create" action="{{ route('dashboard.categories.create') }}" method="POST">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">{{ __('messages.dashboard.categories.create.form.name') }}</label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">{{ __('messages.dashboard.categories.create.form.submit') }}</button>
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

            $('#dashboard_category_create').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 4,
                        maxlength: 64,
                        remote: {
                            type: 'POST',
                            url: '/api/categories/exists'
                        }
                    }
                },
                messages: {
                    name: {
                        required: '{{ __('validation.custom.name.required') }}',
                        minlength: '{{ __('validation.custom.name.min', ['min' => 4]) }}',
                        maxlength: '{{ __('validation.custom.name.max', ['max' => 64]) }}',
                        remote: '{{ __('validation.custom.name.unique') }}'
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