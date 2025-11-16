<?php

namespace App\Livewire\User\Wishlist;

use App\Models\Wishlist as ModelsWishlist;
use Livewire\Component;

class Wishlist extends Component
{

    public $product;
    public $inWishlist;


    public function mount($product)
    {
        $this->product = $product;

        if (auth('web')->check()) {
            $this->inWishlist = ModelsWishlist::where('user_id', auth('web')->id())
                ->where('product_id', $product->id)
                ->exists();
        } else {
            $this->inWishlist = false;
        }
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

        $this->dispatch('wishlist-added','Product added to wishlist');
        $this->dispatch('wishlist-refresh');
    }

    public function removeProductFromWishlist($productId)
    {
        if (!auth('web')->check()) {
            return redirect()->route('user.login');
        }
        ModelsWishlist::where('user_id', auth('web')->user()->id)->where('product_id', $productId)->delete();
        $this->inWishlist = false;
        $this->dispatch('wishlist-removed','Product removed from wishlist');
        $this->dispatch('wishlist-refresh');
    }
    public function render()
    {
        return view('livewire.user.wishlist.wishlist');
    }
}
