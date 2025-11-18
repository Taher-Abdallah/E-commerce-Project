<?php

namespace App\Livewire\User\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CartItem;
use Livewire\Attributes\On;

class CartIcon extends Component
{

    public function removeFromCart($id){
        if(auth('web')->check()){
            $cartItem=CartItem::find($id);
            $cartItem->delete();
            $this->dispatch('cart-refresh');
            
        }

        $this->dispatch('order-summary-refresh');
    }

#[On('cart-refresh')]
    public function render()
    {
        $auth= auth('web')->user();
        $cart=$auth?Cart::where('user_id', auth('web')->user()->id)->first() : [];
        $cartQuantity = $auth ? $cart->cartItems()->count() :0 ;
        $cartSlider=$auth? $cart->cartItems()->with('product')->get() : [];
                return view('livewire.user.cart.cart-icon',get_defined_vars());
    }
}
