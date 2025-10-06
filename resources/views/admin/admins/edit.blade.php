@extends('admin.master')
@section('title')
    Create admin
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Admins</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">{{ __('keywords.admins') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ __('keywords.edit') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">{{ __('keywords.create_admin') }}</h4>
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
                            <form class="form" action="{{ route('admin.admins.update', $admin) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- for update validiation --}}
                                <input name="id" type="hidden" value="{{ $admin->id }}"> 
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('keywords.update_admin') }}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Admin Name</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                   value="{{ $admin->name }}"  placeholder="Name" name="name">
                                                   <x-error-validate field="name" />
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Admin Email</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                value="{{ $admin->email }}" placeholder="Name" name="email">
                                                <x-error-validate field="email" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Password</label>
                                                <input type="passwrod" id="userinput1" class="form-control border-primary"
                                                    placeholder="Enter Password" name="password" >
                                                    <x-error-validate field="password" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1"> Password Confirmation</label>
                                                <input type="password" id="userinput1" class="form-control border-primary"
                                                    placeholder="Enter Password Confirmation" name="password_confirmation">
                                                    <x-error-validate field="password_confirmation" />
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Role</label>
                                                <select class="form-control" name="role_id">
                                                    <optgroup label="Select Role">
                                                        @foreach ($roles as $role)
                                                            <option @selected($role->id  == $admin->role_id) value="{{ $role->id }}">{{ $role->role }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                <x-error-validate field="role_id" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-1">
                                                <label>Select Status</label>
                                                <select class="form-control" name="status">
                                                    <optgroup label="Select Role">
                                                       
                                                        <option  @selected( $admin->status == 'Active' ) value="1">Active</option>
                                                        <option  @selected( $admin->status == 'Inactive' )  value="0">Inactive</option>
                                                    </optgroup>
                                                </select>
                                                <x-error-validate field="status" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
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
