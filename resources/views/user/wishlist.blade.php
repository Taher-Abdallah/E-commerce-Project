@extends('user.master')
@section('title', 'Wishlist')
@section('content')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index-2.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Wishlist</h1>
            </div>
        </div>
    </section>

    <section class="cart product wishlist footer-padding" data-aos="fade-up">
    @livewire('user.wishlist.wishlist-table',['wishlists' => $wishlists])
    </section>


@endsection



