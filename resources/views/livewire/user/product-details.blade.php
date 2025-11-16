<div>
                            <span class="wrapper-subtitle">{{ $product->category->name }}</span>
                            <h5>{{ $product->name }}
                            </h5>
                            <div class="ratings">
                                <span>
                                    <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                            fill="#FFA800" />
                                        <path
                                            d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                            fill="#FFA800" />
                                    </svg>
                                </span>
                                <span class="text">6 Reviews</span>
                            </div>

                            {{-- product price --}}
                            <div class="price">
                                @if ($product->has_variants == 0)
                                    <span class="price-cut">{{ $product->price }} EGP</span>
                                    <span class="new-price">{{ $product->getPriceAfterDiscount() }} EGP</span>
                                @else
                                    <span class="new-price">{{ $price ?? '' }} EGP</span>
                                @endif

                            </div>
                            <p class="content-paragraph">{{ $product->desc }}</span></p>
                            <hr>

                            {{-- product avalibality --}}
                            <div class="product-availability">
                                <span>Availabillity : </span>
                                <span class="inner-text">
                                    @if ($product->has_variants)
                                        {{ $quantity }} Products Available
                                    @else
                                        {{ $product->manage_stock == 1 ? $product->quantity : 'In Stock' }}

                                </span>
                                @endif
                            </div>


                            {{-- product variants --}}
                            @if ($product->has_variants)
                                <div class="product-size">
                                    <P class="size-title">Size</P>
                                    <div class="size-section">
                                        <span class="size-text">Select your size</span>
                                        <div class="toggle-btn">
                                            <span class="toggle-btn2"></span>
                                            <span class="chevron">
                                                <svg width="11" height="7" viewBox="0 0 11 7" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.4 6.8L0 1.4L1.4 0L5.4 4L9.4 0L10.8 1.4L5.4 6.8Z"
                                                        fill="#222222" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="size-option">
                                        @foreach ($variants as $item)
                                            <a href="javascript:void(0)" wire:click="changeVariant({{ $item->id }})"
                                                class="option">
                                                @foreach ($item->variantAttributes as $value)
                                                    <span
                                                        class="option-text">{{ $value->attributeValue->attribute->name }}</span>
                                                    <span
                                                        class="option-measure">{{ $value->attributeValue->value }}</span>
                                                @endforeach
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif




                            @php
                            $sharedUrl=urlencode(url()->current());
                            @endphp


                            {{-- product share  --}}
                            <div class="product-share">
                                <p>Share This:</p>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$sharedUrl}}">
                                        <span class="facebook">
                                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3 16V9H0V6H3V4C3 1.3 4.7 0 7.1 0C8.3 0 9.2 0.1 9.5 0.1V2.9H7.8C6.5 2.9 6.2 3.5 6.2 4.4V6H10L9 9H6.3V16H3Z"
                                                    fill="#3E75B2" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="https://pinterest.com/pin/create/button/?url={{$sharedUrl}}">
                                        <span class="pinterest">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 0C3.6 0 0 3.6 0 8C0 11.4 2.1 14.3 5.1 15.4C5 14.8 5 13.8 5.1 13.1C5.2 12.5 6 9.1 6 9.1C6 9.1 5.8 8.7 5.8 8C5.8 6.9 6.5 6 7.3 6C8 6 8.3 6.5 8.3 7.1C8.3 7.8 7.9 8.8 7.6 9.8C7.4 10.6 8 11.2 8.8 11.2C10.2 11.2 11.3 9.7 11.3 7.5C11.3 5.6 9.9 4.2 8 4.2C5.7 4.2 4.4 5.9 4.4 7.7C4.4 8.4 4.7 9.1 5 9.5C5 9.7 5 9.8 5 9.9C4.9 10.2 4.8 10.7 4.8 10.8C4.8 10.9 4.7 11 4.5 10.9C3.5 10.4 2.9 9 2.9 7.8C2.9 5.3 4.7 3 8.2 3C11 3 13.1 5 13.1 7.6C13.1 10.4 11.4 12.6 8.9 12.6C8.1 12.6 7.3 12.2 7.1 11.7C7.1 11.7 6.7 13.2 6.6 13.6C6.4 14.3 5.9 15.2 5.6 15.7C6.4 15.9 7.2 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0Z"
                                                    fill="#E12828" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{$sharedUrl}}">
                                        <span class="twitter">
                                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.0722 1.60052C16.432 1.88505 15.7562 2.06289 15.0448 2.16959C15.7562 1.74278 16.3253 1.06701 16.5742 0.248969C15.8985 0.640206 15.1515 0.924742 14.3335 1.10258C13.6933 0.426804 12.7686 0 11.7727 0C9.85206 0 8.28711 1.56495 8.28711 3.48557C8.28711 3.7701 8.32268 4.01907 8.39382 4.26804C5.51289 4.12577 2.9165 2.73866 1.17371 0.604639C0.889175 1.13814 0.71134 1.70722 0.71134 2.34742C0.71134 3.5567 1.31598 4.62371 2.27629 5.26392C1.70722 5.22835 1.17371 5.08608 0.675773 4.83711V4.87268C0.675773 6.5799 1.88505 8.00258 3.48557 8.32268C3.20103 8.39382 2.88093 8.42938 2.56082 8.42938C2.34742 8.42938 2.09845 8.39382 1.88505 8.35825C2.34742 9.74536 3.62784 10.7768 5.15722 10.7768C3.94794 11.7015 2.45412 12.2706 0.818041 12.2706C0.533505 12.2706 0.248969 12.2706 0 12.2351C1.56495 13.2309 3.37887 13.8 5.37062 13.8C11.8082 13.8 15.3294 8.46495 15.3294 3.84124C15.3294 3.69897 15.3294 3.52113 15.3294 3.37887C16.0052 2.9165 16.6098 2.31186 17.0722 1.60052Z"
                                                    fill="#3FD1FF" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
</div>
