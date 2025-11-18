<?php

namespace App\Livewire\User;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CartItem;

use Livewire\Attributes\On;
use function Pest\Laravel\json;

class ProductDetails extends Component
{
    public $product;
    public $variantId;
    public $quantity;
    public $price;

    public $cartQuantity = 1;
    public $cartAttributesArray = [];
    public $isSizeOpen = false;

    public function toggleSize()
    {
        $this->isSizeOpen = !$this->isSizeOpen;
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->variantId = $product->has_variants ? $this->product->productVariants->first()->id : null;
        $this->quantity = $product->has_variants ? $this->product->productVariants->first()->stock : $product->quantity;
        $this->price = $product->has_variants ? $this->product->productVariants->first()->price : $product->price;
    }


    public function changeVariant($variantId)
    {
        $variants = $this->product->productVariants->find($variantId);
        if (!$variants) {
            return response()->json(['message' => 'Variant Not Found'], 404);
        }
        $this->changeProperitesValues($variants);
    }

    public function changeProperitesValues($variants)
    {
        $this->variantId = $variants->id;
        $this->quantity = $variants->stock;
        $this->price = $variants->price;

        $this->dispatch('restore-counter');
    }

    #[On('restore-counter')]
    public function restoreCounter()
    {
        $this->cartQuantity = 1;
    }

    public function incrementCartQuantity()
    {
        $this->cartQuantity++;
    }
    public function decrementCartQuantity()
    {

        if ($this->cartQuantity > 1) {
            $this->cartQuantity--;
        }
    }

    public function addToCart()
    {
        $product = $this->product;
        if (auth('web')->check()) {
            $userId = auth('web')->user()->id;
            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            if (!$product->has_variants) {
                $cartItem = CartItem::where(['cart_id' => $cart->id, 'product_id' => $product->id])
                    ->whereNull('product_variant_id')
                    ->first();

                //if it's in cartItem add the quantity
                if ($cartItem) {
                    $cartItem->increment('quantity', $this->cartQuantity);
                }
                //when you add to cart first time
                else {
                    CartItem::create([
                        'cart_id' => $cart->id,
                        'product_id' => $product->id,
                        'quantity' => $this->cartQuantity,
                        'price' => $product->price,
                        'product_variant_id' => null,
                        'attributes' => null,
                    ]);
                }
            }

            if ($product->has_variants) {
                $variant = $product->productVariants->find($this->variantId);
                $variant->load('variantAttributes');
                $cartItem = CartItem::where(['cart_id' => $cart->id])
                    ->where('product_variant_id', $this->variantId)
                    ->first();

                if ($cartItem) {
                    $cartItem->increment('quantity', $this->cartQuantity);
                }
                //when you add to cart first time
                else {

                    foreach ($variant->variantAttributes as $varAttr) {
                        $this->cartAttributesArray[$varAttr->attributeValue->attribute->name] = $varAttr->attributeValue->value;
                    }
                    CartItem::create([
                        'cart_id' => $cart->id,
                        'product_id' => $product->id,
                        'quantity' => $this->cartQuantity,
                        'product_variant_id' => $this->variantId,
                        'price' => $variant->price,
                        'attributes' => json_encode($this->cartAttributesArray, JSON_UNESCAPED_UNICODE),
                    ]);
                }
            }
            $this->dispatch('cart-added', 'Product added to cart');
            $this->dispatch('cart-refresh');
        } else {
            return redirect()->route('user.login');
        }
    }


    public function render()
    {
        return view('livewire.user.product-details', ['variants' => $this->product->productVariants]);
    }
}
