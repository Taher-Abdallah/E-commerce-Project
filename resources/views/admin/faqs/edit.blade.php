@extends('admin.master')
@section('title')
    Edit Faqs
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Basic Forms</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">faqs</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Edit Faq</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">Edit Faq</h4>
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
                            <form class="form" action="{{ route('admin.faqs.update', $faq->id) }}" enctype="multipart/form-data"  method="POST" files="true') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>Edit New Faq</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="question">Question</label>
                                                <input type="text" id="question" class="form-control" value="{{ $faq->question }}"
                                                    placeholder="Enter the question" name="question">
                                            </div>
                                            <x-error-validate field="question" />
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="answer">Answer</label>
                                                <textarea id="answer" class="form-control" rows="5" placeholder="Enter the answer"
                                                 name="answer">{{ $faq->answer }}</textarea>
                                            </div>
                                            <x-error-validate field="answer" />
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                </div>
                                <div class="form-actions right">
                                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
