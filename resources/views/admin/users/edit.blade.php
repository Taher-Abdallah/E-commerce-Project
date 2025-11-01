@extends('admin.master')
@section('title', __('keywords.edit_user'))


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.users') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.users.index') }}">{{ __('keywords.users') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('keywords.edit_user') }}</li>
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
                                <h4 class="card-title">{{ __('keywords.edit_user') }}</h4>
                            </div>


                            <div class="card-content">
                                <div class="card-body">
                                    <div class="container mt-4">
                                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">{{ __('keywords.name') }}</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" value="{{ old('name', $user->name) }}" required>
                                                <x-error-validate field="name" />
                                            </div>


                                            <!-- Email -->
                                            <div class="form-group">
                                                <label for="email">{{ __('keywords.email') }}</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ old('email', $user->email) }}" required>
                                                <x-error-validate field="email" />
                                            </div>


                                            <!-- password -->
                                            <div class="form-group">
                                                <label for="password">{{ __('keywords.password') }} <small class="text-muted">({{ __('keywords.leave_empty_to_keep') }})</small></label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password">
                                                <x-error-validate field="password" />
                                            </div>


                                            <!-- Phone -->
                                            <div class="form-group">
                                                <label for="phone">{{ __('keywords.phone') }}</label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    name="phone" value="{{ old('phone', $user->phone) }}" required>
                                                <x-error-validate field="phone" />
                                            </div>



                                            <!-- Status -->
                                            <div class="form-group">
                                                <label for="status">{{ __('keywords.status') }}</label>
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                    id="status" name="status" required>
                                                    <option value="">{{ __('keywords.select_status') }}</option>
                                                    <option value="1"
                                                        {{ old('status', $user->status) == 1 ? 'selected' : '' }}>
                                                        {{ __('keywords.active') }}
                                                    </option>
                                                    <option value="0"
                                                        {{ old('status', $user->status) == 0 ? 'selected' : '' }}>
                                                        {{ __('keywords.inactive') }}
                                                    </option>
                                                </select>
                                                <x-error-validate field="status" />
                                            </div>


                                            <!-- City -->
                                            <div class="form-group">
                                                <label for="city_id">{{ __('keywords.city') }}</label>
                                                <select class="form-control @error('city_id') is-invalid @enderror"
                                                    id="city_id" name="city_id" required>
                                                    <option value="">{{ __('keywords.select_city') }}</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                            {{ old('city_id', $user->city_id) == $city->id ? 'selected' : '' }}>
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-error-validate field="city_id" />
                                            </div>





                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check"></i> {{ __('keywords.update') }}
                                                </button>
                                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                                    <i class="la la-times"></i> {{ __('keywords.cancel') }}
                                                </a>
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
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('#city_id').select2({
                placeholder: "{{ __('keywords.search_city') }}",
                allowClear: true,
                language: {
                    noResults: function() {
                        return "{{ __('keywords.no_results') }}";
                    },
                    searching: function() {
                        return "{{ __('keywords.searching') }}...";
                    }
                }
            });
        });
    </script>
@endpush
