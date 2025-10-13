@extends('admin.master')
@section('title', __('keywords.create_attribute'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.attributes_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.attributes.index') }}">
                                        {{ __('keywords.attributes') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('keywords.create_attribute') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-11">
                    <div class="content-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ __('keywords.attributes') }}
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form" action="{{ route('admin.attributes.store') }}" method="POST">
                                        @csrf

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.name') }}</label>
                                                <input type="text" value="{{ old('name') }}" class="form-control"
                                                    placeholder="{{ __('keywords.name') }}" name="name">
                                                <x-error-validate field="name" />
                                            </div>


                                            <div class="form-group row align-items-end">
                                                <div class="col-md-8">
                                                    <label for="eventRegInput1">{{ __('keywords.value') }}</label>
                                                    <input type="text" value="{{ old('value.0') }}" class="form-control"
                                                        placeholder="{{ __('keywords.value') }}" name="value[0]">
                                                    @foreach ($errors->get('value.*') as $key => $messages)
                                                        @foreach ($messages as $message)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @endforeach
                                                    @endforeach
                                                </div>

                                                <div class="col-md-2">
                                                    <button disabled type="button" class="btn btn-danger w-100 remove">
                                                        <i class="la la-close"></i>
                                                    </button>
                                                </div>

                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary w-100 add" id="add_more">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-actions left">
                                            <a href="{{ url()->previous() }}" type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('keywords.cancel') }}
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{ __('keywords.save') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            let valueIndex = 1;
            $('#add_more').click(function(e) {
                e.preventDefault();
                let newRow = `<div class="form-group row align-items-end">
                                <div class="col-md-8">
                                    <input type="text" value="" class="form-control" placeholder="{{ __('keywords.value') }}" name="value[${valueIndex}]">
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger w-100 remove">
                                        <i class="la la-close"></i>
                                    </button>
                                </div>

                            </div>`;
                $('.align-items-end:last').after(newRow);
                valueIndex++;
            });
            $(document).on('click', '.remove', function(e) {
                e.preventDefault();
                $(this).closest('.align-items-end').remove();
            });

        });
    </script>
@endpush
