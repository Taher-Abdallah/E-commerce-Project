@extends('admin.master')
@section('title')
    Create settings
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Settings</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>

                                <li class="breadcrumb-item active"><a href="#">{{ __('keywords.show') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">{{ __('keywords.create_settings') }}
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
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" action="{{ route('admin.settings.update', $setting->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('keywords.settings') }}</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first-name-column">Name</label>
                                                <input  type="text" id="first-name-column" class="form-control"
                                                    placeholder="Name" name="site_name"
                                                    value="{{ $setting->site_name ?? '' }}">
                                                    <x-error-validate field="site_name" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last-name-column">Email</label>
                                                <input  type="text" id="last-name-column" class="form-control"
                                                    placeholder="Email" name="email" value="{{ $setting->email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last-name-column">Email Support </label>
                                                <input  type="text" id="last-name-column" class="form-control"
                                                    placeholder="Email Support" name="email_support"
                                                    value="{{ $setting->email_support ?? '' }}">
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first-name-column">Phone</label>
                                                <input  type="text" id="first-name-column" class="form-control"
                                                    placeholder="Phone" name="phone" value="{{ $setting->phone ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last-name-column">Address</label>
                                                <input  type="text" id="last-name-column" class="form-control"
                                                    placeholder="Address" name="address"
                                                    value="{{ $setting->address ?? '' }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first-name-column">Facebook</label>
                                                <input  type="text" id="first-name-column" class="form-control"
                                                    placeholder="Facebook" name="facebook"
                                                    value="{{ $setting->facebook ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last-name-column">Twitter</label>
                                                <input  type="text" id="last-name-column" class="form-control"
                                                    placeholder="Twitter" name="twitter"
                                                    value="{{ $setting->twitter ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last-name-column">Youtube</label>
                                                <input  type="text" id="last-name-column" class="form-control"
                                                    placeholder="Youtube" name="youtube"
                                                    value="{{ $setting->youtube ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="eventRegInput1">{{ __('keywords.logo') }}</label>
                                                <input  type="file" class="form-control" name="logo"
                                                    id="single-image-edit" placeholder="{{ __('keywords.logo') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last-name-column">Favicon</label>
                                                <input  type="file" class="form-control" name="favicon"
                                                    id="single-favicon-edit" placeholder="{{ __('keywords.favicon') }}">
                                            </div>
                                        </div>



                                    </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> {{ __('keywords.save') }}
                                        </button>
                                        {{-- <a href="{{ route('admin.settings.update', $setting->id) }}"
                                            class="btn btn-warning mr-1">
                                            <i class="ft-edit"></i> Update
                                        </a> --}}

                                    </div>
                            </form>
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
                    "{{ asset('storage/settings/logo/' . $setting->logo) }}"
                ],
            });
        });
    </script>

    <script>
        $(function() {
            $("#single-favicon-edit").fileinput({
                theme: "fa5",
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedFileTypes: ["image"],
                MaxFileCount: 1,
                showUpload: false,
                enableResumableUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset('storage/settings/favicon/' . $setting->favicon) }}"
                ],
            });
        });
    </script>
@endpush
