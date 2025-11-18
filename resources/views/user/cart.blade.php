
@extends('user.master')
@section('title', __('dashboard.cart'))
@section('content')


    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index-2.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Cart</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Cart</h1>
            </div>
        </div>
    </section>


    <section class="product-cart product footer-padding">
    @livewire('user.cart.cart-table')


    </section>
@endsection