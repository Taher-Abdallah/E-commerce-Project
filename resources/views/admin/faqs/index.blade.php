@extends('admin.master')
@section('title','Faqs')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.faqs_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">{{ __('keywords.faqs') }}</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">{{ __('keywords.faqs') }} </h4>
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
                            <a href="{{ route('admin.faqs.create') }}" class="btn btn-danger">{{ __('keywords.add') }}</a><br><br>
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('keywords.question') }}</th>
                                        <th scope="col">{{ __('keywords.answer') }} </th>
                                        <th scope="col">{{ __('keywords.operations') }} </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <th scope="row">{{ $faqs->firstItem() + $loop->index }}</th>
                                            <td>{{ $faq->question }} </td>
                                            <td>{{ $faq->answer }}</td>
                                            <td>
                                                <div class="dropdown float-md-left">
                                                    <button class="btn btn-danger dropdown-toggle round btn-glow px-2"
                                                        id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">Operations</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.faqs.edit', $faq->id) }}"><i
                                                                class="la la-edit"></i>Edit</a>

                                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                                            href="javascript:void(0)"
                                                            onclick="if(confirm('Are you sure you want to delete this faq?')){document.getElementById('delete-form-{{ $faq->id }}').submit();} return false"><i
                                                                class="la la-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                        {{-- delete form  --}}
                                        <form id="delete-form-{{ $faq->id }}"
                                            action="{{ route('admin.faqs.destroy', $faq) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                    @empty
                                        <td colspan="4" class="text-center"> No Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $faqs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
