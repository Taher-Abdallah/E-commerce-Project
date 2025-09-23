@extends('admin.auth.master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('admin-assets/images/logo/logo-dark.png') }}" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('keywords.reset_password') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('admin.password.store') }}" method="POST">
                                            @csrf
                                            
                                            {{-- new password --}}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" class="form-control input-lg"
                                                       placeholder="{{ __('keywords.password') }}" tabindex="1" >
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>

                                            {{-- confirm password --}}
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password_confirmation" class="form-control input-lg"
                                                       placeholder="{{ __('keywords.confirm_password') }}" tabindex="2" >
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>

                                            <button type="submit" class="btn btn-danger btn-block btn-lg">
                                                <i class="ft-unlock"></i> {{ __('keywords.reset_password') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
