@extends('user.master')
@section('title', __('dashboard.brands'))
@section('content')

    {{-- breadcrump and header title --}}
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('user.index') }}">{{ __('keywords.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)" class="active">{{ __('keywords.all_brands') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('keywords.brands') }}</h1>
            </div>
        </div>
    </section>

    {{-- Brands section --}}
    <section class="product brand" data-aos="fade-up">
        <div class="container">

            <div style="margin-bottom: 80px" class="brand-section">
                @forelse ($brands as $item)
                    <div style="margin: 6px" class="product-wrapper">
                        <div class="wrapper-img">
                            <a href="{{ route('user.brands.show',$item->slug) }}">
                                <img src="{{ asset('storage/brands/'.$item->logo) }}" alt="{{ $item->name }}">
                            </a>
                        </div>
                    </div>
                @empty
                    <h3>{{ __('keywords.no_brands_found') }}</h3>
                @endforelse

            </div>
        </div>
    </section>

@endsection
