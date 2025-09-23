@extends('admin.auth.master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('admin-assets') }}/images/logo/logo-dark.png"
                                            alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>{{ __('keywords.LoginwithModern') }}</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('admin.login.store') }}" method="POST">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="email" value="{{ old('email') }}"
                                                    class="form-control input-lg" id="user-name"
                                                    placeholder="{{ __('keywords.email') }}" tabindex="1">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" value="{{ old('password') }}" name="password"
                                                    class="form-control input-lg" id="password"
                                                    placeholder="{{ __('keywords.password') }}" tabindex="2">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>
                                            <div class="form-group">
                                                <div class="text-center">
                                                    {!! NoCaptcha::display() !!} 
                                                    @error('g-recaptcha-response')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                  </div>
                                            </div>
                                                <div class="form-group row">
                                                    <fieldset>
                                                        <input type="checkbox" name="remember" id="remember-me"
                                                            class="chk-remember">
                                                        <label for="remember-me"> {{ __('keywords.RememberMe') }}</label>
                                                    </fieldset>
                                                    <div class="col-md-6 col-12 text-center text-md-right"><a
                                                            href="recover-password.html" class="card-link">
                                                            {{ __('keywords.forgot') }} </a></div>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-block btn-lg"><i
                                                        class="ft-unlock"></i> {{ __('keywords.login') }}</button>
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
