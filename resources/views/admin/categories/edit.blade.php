@extends('admin.master')
@section('title', __('keywords.edit_category'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.governorates_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">
                                        {{ __('keywords.categories') }}</a>
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
                                    <form class="form" action="{{ route('admin.categories.update', $category->id) }}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input name="id" value="{{ $category->id }}" type="hidden">

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.name') }}</label>
                                                <input type="text" value="{{ $category->name }}" class="form-control"
                                                    placeholder="{{ __('keywords.name') }}" name="name">
                                                    <x-error-validate field="name" />
                                            </div>

                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.select_parent') }}</label>
                                                <select name="parent" class="form-control">
                                                    <option value="">{{ __('keywords.select_parent') }}</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}" @selected($category->parent == $cat->id )>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                                <x-error-validate field="parent" />
                                            </div>

                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.icon') }}</label>
                                                <input type="file" value="{{ old('icon')}}" class="form-control" id="single-image-edit"
                                                    placeholder="{{ __('keywords.icon') }}" name="icon">
                                                    <x-error-validate field="icon" />
                                            </div>


                                            <div class="form-group">
                                                <label>{{ __('keywords.status') }}</label>
                                                <div class="input-group">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" value="1" @checked($category->status == 1) name="status" class="custom-control-input"
                                                            id="yes1">
                                                        <label class="custom-control-label" for="yes1">{{ __('keywords.active') }}</label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio">
                                                        <input type="radio" value="0" @checked($category->status == 0 ) name="status" class="custom-control-input"
                                                            id="no1">
                                                        <label class="custom-control-label" for="no1">{{ __('keywords.inactive') }}</label>
                                                    </div>
                                                </div>
                                                <x-error-validate field="status" />
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
            allowedFileExtensions: ["jpg", "png", "gif"],
            allowedFileTypes: ["image"],
            MaxFileCount: 1,
            showUpload: false,
            enableResumableUpload: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('storage/categories/' . $category->icon) }}"
            ],
        });
    });
  </script>
@endpush
