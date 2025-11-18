@extends('user.master')
@section('title', __('keywords.checkout'))
@section('content')

    <section class="blog about-blog">
      <div class="container">
        <div class="blog-bradcrum">
          <span><a href="index-2.html">Home</a></span>
          <span class="devider">/</span>
          <span><a href="#">Checkout</a></span>
        </div>
        <div class="blog-heading about-heading">
          <h1 class="heading">Checkout</h1>
        </div>
      </div>
    </section>

    <section class="checkout product footer-padding">
      <div class="container">
        <div class="checkout-section">
          <div class="row gy-5">
            <div class="col-lg-6">
            @livewire('user.checkout.shipping-details')
            </div>

            {{-- cart details --}}
            <div class="col-lg-6">
            @livewire('user.checkout.order-summary')

            <div class="review-form">
              @livewire('user.coupon')
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection