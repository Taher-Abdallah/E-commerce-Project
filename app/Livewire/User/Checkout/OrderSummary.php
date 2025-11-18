<?php

namespace App\Livewire\User\Checkout;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class OrderSummary extends Component
{
    public $shippingPrice=0;

    #[On('shipping-price')]
    public function updateShippingPrice($price)
    {
        $this->shippingPrice=$price;
    }
    #[On('order-summary-refresh')]
    public function render()
    {
        $auth= auth('web')->user()->id;
        $cart =Cart::where('user_id', $auth)->with(['cartItems'])->first();
        return view('livewire.user.checkout.order-summary', compact('cart'));
    }
}
