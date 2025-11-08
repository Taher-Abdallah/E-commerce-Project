@extends('admin.master')
@section('title', __('keywords.edit_slider'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.sliders_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">
                                        {{ __('keywords.sliders') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('keywords.category_edit') }}</a>
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
                                    {{ __('keywords.category_edit') }}
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


                                    <p class="card-text">{{ __('keywords.form_edit') }}.</p>
                                    <form class="form" action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input name="id" value="{{ $slider->id }}" type="hidden">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.note') }}</label>
                                                <input type="text" value="{{ $slider->note }}" class="form-control"
                                                    placeholder="{{ __('keywords.note') }}" name="note">
                                                    <x-error-validate field="note" />
                                            </div>

                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.file_name') }}</label>
                                                <input type="file" class="form-control" name="file_name" id="single-image-edit"
                                                    placeholder="{{ __('keywords.file_name') }}">
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
@push('js')
  <script>
    $(function() {
        $("#single-image-edit").fileinput({
            theme: "fa5",
            allowedFileExtensions: ["jpg", "png", "gif","webp"],
            allowedFileTypes: ["image"],
            MaxFileCount: 1,
            showUpload: false,
            enableResumableUpload: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset( $slider->file_name) }}"
            ],
        });
    });
  </script>
@endpush
