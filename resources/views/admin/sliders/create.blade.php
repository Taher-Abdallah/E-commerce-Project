@extends('admin.master')
@section('title', __('keywords.create_slider'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.sliders') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.sliders') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">
                                        {{ __('keywords.sliders') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('keywords.create_brand') }}</a>
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
                                    {{ __('keywords.governorates') }}
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

                                    <form class="form" action="{{ route('admin.sliders.store')}}" method="POST" enctype="multipart/form-data" >
                                        @csrf

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.note') }}</label>
                                                <input type="text" value="{{ old('note')}}" class="form-control"
                                                    placeholder="{{ __('keywords.note') }}" name="note">
                                                    <x-error-validate field="note" />
                                            </div>

                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.file_name') }}</label>
                                                <input type="file" value="{{ old('file_name')}}" class="form-control" id="single-image"
                                                    placeholder="{{ __('keywords.file_name') }}" name="file_name">
                                                    <x-error-validate field="file_name" />
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
