@extends('user.master')

@section('title', __('keywords.categories'))
@section('content')

    {{-- breadcrump and header title --}}
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('user.index') }}">{{ __('keywords.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)" class="active">{{ __('keywords.all_categories') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('keywords.categories') }}</h1>
            </div>
        </div>
    </section>

    {{-- categories section --}}
    <section class="product-category">
        <div class="container">
            <div style="margin-bottom: 80px" class="category-section">
                @forelse ($categories as $item)
                    <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                        <div class="wrapper-img">
                            <img src="{{ asset('storage/categories/' . $item->icon) }}" alt="{{ $item->name }}">
                        </div>

                        <div class="wrapper-info">
                            <a href="{{ route('user.category.show', $item->slug) }}"
                                class="wrapper-details">{{ $item->name }}</a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">{{ __('keywords.no_categories') }}</div>
                @endforelse

                

            </div>
        </div>
    </section>


@endsection