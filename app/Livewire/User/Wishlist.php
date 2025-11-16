<?php

namespace App\Livewire\User;

use App\Models\Wishlist as ModelsWishlist;
use Livewire\Component;

class Wishlist extends Component
{
    public $product;
    public $inWishlist;

    public function mount($product)
    {
        $this->product = $product;

        $this->inWishlist = ModelsWishlist::where('user_id', auth('web')->user()->id)->where('product_id', $product->id)->exists();
    }

    public function addProductToWishlist($productId)
    {
        if (!auth('web')->check()) {
            return redirect()->route('user.login');
        }

        ModelsWishlist::create([
            'user_id' => auth('web')->user()->id,
            'product_id' => $productId
        ]);

        $this->inWishlist = true;
    }

    public function removeProductFromWishlist($productId)
    {
        if (!auth('web')->check()) {
            return redirect()->route('user.login');
        }
        ModelsWishlist::where('user_id', auth('web')->user()->id)->where('product_id', $productId)->delete();
        $this->inWishlist = false;
    }


    public function render()
    {
        return view('livewire.user.wishlist');
    }
}
