@extends('admin.master')
@section('title', __('keywords.edit_coupon'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.coupons_table') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">
                                        {{ __('keywords.coupons') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('keywords.edit_coupon') }}</a>
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
                                    {{ __('keywords.coupons') }}
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
                                    <form class="form" action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{-- <input type="hidden" name="id" value="{{ $coupon->id }}"> --}}
                                        <div class="form-body">
                                            <div class="row">
                                                <!-- code -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput1">{{ __('keywords.code') }}</label>
                                                        <input type="text" value="{{ $coupon->code }}"
                                                            class="form-control" placeholder="{{ __('keywords.code') }}"
                                                            name="code">
                                                        <x-error-validate field="code" />
                                                    </div>
                                                </div>

                                                <!--  discount_percentage -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="eventRegInput1">{{ __('keywords.discount_percentage') }}</label>
                                                        <input type="text" value="{{$coupon->discount_percentage}}"
                                                            class="form-control"
                                                            placeholder="{{ __('keywords.discount_percentage') }}"
                                                            name="discount_percentage">
                                                        <x-error-validate field="discount_percentage" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-body">
                                            <div class="row">
                                                <!-- Start Date -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_date">{{ __('keywords.start_date') }}</label>
                                                        <input type="date" value="{{$coupon->start_date}}"   
                                                            class="form-control"
                                                            placeholder="{{ __('keywords.start_date') }}"
                                                            name="start_date">
                                                        <x-error-validate field="start_date" />
                                                    </div>
                                                </div>

                                                <!-- End Date -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_date">{{ __('keywords.end_date') }}</label>
                                                        <input type="date" value="{{ $coupon->end_date }}"
                                                            class="form-control"
                                                            placeholder="{{ __('keywords.end_date') }}" name="end_date">
                                                        <x-error-validate field="end_date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-body">
                                            <div class="row">
                                                <!-- Limit -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="limit">{{ __('keywords.limit') }}</label>
                                                        <input type="number" value="{{ $coupon->limit }}"
                                                            class="form-control" placeholder="{{ __('keywords.limit') }}"
                                                            name="limit">
                                                        <x-error-validate field="limit" />
                                                    </div>
                                                </div>

                                                <!-- Time Used -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="time_used">{{ __('keywords.time_used') }}</label>
                                                        <input type="number" value="{{ $coupon->time_used }}"
                                                            class="form-control"
                                                            placeholder="{{ __('keywords.time_used') }}"
                                                            name="time_used">
                                                        <x-error-validate field="time_used" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>{{ __('keywords.status') }}</label>
                                            <div class="input-group">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" value="1" name="is_active" @checked($coupon->is_active==1)
                                                        class="custom-control-input" id="yes1">
                                                    <label class="custom-control-label"
                                                        for="yes1">{{ __('keywords.active') }}</label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio">
                                                    <input type="radio" value="0" name="is_active" @checked($coupon->is_active==0)
                                                        class="custom-control-input" id="no1">
                                                    <label class="custom-control-label"
                                                        for="no1">{{ __('keywords.inactive') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <x-error-validate field="is_active" />

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
