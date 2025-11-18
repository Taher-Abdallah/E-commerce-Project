<?php

namespace App\Livewire\User\Cart;

use Livewire\Component;
use App\Models\CartItem;
use Livewire\Attributes\On;

class CartTable extends Component
{

    public function incrementCartQuantity($cartItemId){
        $cartItem = CartItem::find($cartItemId);
        $cartItem->increment('quantity');
        $cartItem->save();
    }

    public function decrementCartQuantity($cartItemId){

        $cartItem = CartItem::find($cartItemId);
        if($cartItem->quantity > 1){
            $cartItem->decrement('quantity');
            $cartItem->save();
        }
    }

    public function removeFromCart($cartItemId){
        $cartItem = CartItem::find($cartItemId);
        $cartItem->delete();

        $this->dispatch('cart-refresh');
    }

    public function clearCart(){
        CartItem::where('cart_id', auth('web')->user()->cart->id)->delete();
        $this->dispatch('cart-refresh');
    }
    
    #[On('updateCart')]
    public function render()
    {
        $authUser = auth('web')->user();
        $cart = $authUser->cart;
        $cart->load('cartItems.product.productImages');
        return view('livewire.user.cart.cart-table',['cartItems'=>$cart->cartItems]);
    }
}
