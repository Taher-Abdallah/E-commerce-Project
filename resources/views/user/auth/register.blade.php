@extends('user.master')
@section('title', __('website.register'))
@section('content')
    <section class="login account footer-padding">
        <div class="container">
            <form action="{{ route('user.register.store') }}" method="POST">
                @csrf
                <div class="login-section account-section">
                    <div class="review-form">
                        <h5 class="comment-title">{{__('keywords.create_account')}}</h5>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class=" account-inner-form">
                            <div class="review-form-name">
                                <label for="fname" class="form-label">{{__('keywords.name')}}*</label>
                                <input value="{{ old('name') }}" name="name" type="text" id="fname" class="form-control" placeholder="{{__('keywords.name')}}">
                            </div>
                        </div>

                        <div class="account-inner-form">
                            <div class="review-form-name">
                                <label for="email" class="form-label">{{__('keywords.email')}}*</label>
                                <input value="{{ old('email') }}" name="email" type="email" id="email" class="form-control" placeholder="user@gmail.com">
                            </div>
                        </div>

                        <div class="review-form-name">
                           @livewire('general.address-drop-down-dependent')
                        </div>

                        <div class="review-form-name address-form">
                            <label for="address" class="form-label">{{__('keywords.password')}}*</label>
                            <input  name="password" type="password" id="address" class="form-control" placeholder="{{__('keywords.password')}}">
                        </div>

                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" name="terms">
                                <p class="remember">
                                    {{__('keywords.agree_all_termes')}} <span class="inner-text">{{$setting->site_name}}.</span></p>
                            </div>
                        </div>

                        <div class="login-btn text-center">
                            <button type="submit"  class="shop-btn">{{__('keywords.create_account')}}</button>
                            <span class="shop-account">{{__('keywords.have_account')}} ?<a href="{{route('user.login')}}">{{__('keywords.login')}}</a></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
