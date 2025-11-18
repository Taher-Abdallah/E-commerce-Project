<div>
    {{-- Category & Product Name --}}
    <span class="wrapper-subtitle">{{ $product->category->name }}</span>
    <h5>{{ $product->name }}</h5>

    {{-- Ratings --}}
    <div class="ratings">
        <span>
            {{-- ضع SVG النجوم هنا --}}
        </span>
        <span class="text">6 Reviews</span>
    </div>

    {{-- Price --}}
    <div class="price">
        @if ($product->has_variants == 0)
            <span class="price-cut">{{ $product->price }} EGP</span>
            <span class="new-price">{{ $product->getPriceAfterDiscount() }} EGP</span>
        @else
            <span class="new-price">{{ $price ?? '' }} EGP</span>
        @endif
    </div>

    {{-- Description --}}
    <p class="content-paragraph">{{ $product->desc }}</p>
    <hr>

    {{-- Availability --}}
    <div class="product-availability">
        <span>Availability: </span>
        <span class="inner-text">
            @if ($product->has_variants)
                {{ $quantity }} Products Available
            @else
                {{ $product->manage_stock == 1 ? $product->quantity : 'In Stock' }}
            @endif
        </span>
    </div>

    {{-- Variants / Size Selector --}}
    @if ($product->has_variants)
        <div class="product-size">
            <div class="selected-attributes">
                @foreach ($variants as $item)
                    @if ($item->id == $variantId)
                        @foreach ($item->VariantAttributes as $itemAttr)
                            <p class="size-title">
                                {{ $itemAttr->attributeValue->attribute->name }}:
                                {{ $itemAttr->attributeValue->value }}
                            </p>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <br>
            <div class="size-section" wire:click="toggleSize" style="cursor:pointer;">
                <span class="size-text">Select your size</span>
                <span class="chevron">
                    {{-- ضع SVG chevron هنا --}}
                </span>
            </div>

            <ul class="size-option" style="display: {{ $isSizeOpen ? 'block' : 'none' }};">
                @foreach ($variants as $item)
                    <a href="javascript:void(0)" wire:click.prevent="changeVariant({{ $item->id }})" class="option">
                        @foreach ($item->variantAttributes as $value)
                            <span class="option-text">{{ $value->attributeValue->attribute->name }}</span>
                            <span class="option-measure">{{ $value->attributeValue->value }}</span>
                        @endforeach
                    </a>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Share --}}
    @php $sharedUrl = urlencode(url()->current()); @endphp
    <div class="product-share">
        <p>Share This:</p>
        <div class="social-icons">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $sharedUrl }}">
                <span class="facebook">
                    {{-- SVG Facebook --}}
                </span>
            </a>
            <a href="https://pinterest.com/pin/create/button/?url={{ $sharedUrl }}">
                <span class="pinterest">
                    {{-- SVG Pinterest --}}
                </span>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ $sharedUrl }}">
                <span class="twitter">
                    {{-- SVG Twitter --}}
                </span>
            </a>
        </div>
    </div>

    {{-- Quantity & Add to Cart --}}
    <div class="product-quantity">
        <div class="quantity-wrapper">
            <div class="quantity">
                <a href="javascript:void(0)" wire:click.prevent="decrementCartQuantity" class="minus">-</a>
                <span class="number">{{ $cartQuantity }}</span>
                <a href="javascript:void(0)" wire:click.prevent="incrementCartQuantity" class="plus">+</a>
            </div>
        </div>

        <a href="#" wire:click.prevent="addToCart" class="shop-btn">
            <span>
                {{-- SVG Cart --}}
            </span>
            <span>Add to Cart</span>
        </a>
    </div>
</div>
