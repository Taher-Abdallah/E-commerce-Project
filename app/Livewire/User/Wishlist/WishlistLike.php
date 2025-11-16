<?php

namespace App\Livewire\User\Wishlist;

use Livewire\Component;
use Livewire\Attributes\On;

class WishlistLike extends Component
{
    #[On('wishlist-refresh')]
    public function render()
    {
        $wishlistCount = (auth('web')->check()) ? auth('web')->user()->wishlists()->count():0;
        return view('livewire.user.wishlist.wishlist-like', compact('wishlistCount'));
    }
}
