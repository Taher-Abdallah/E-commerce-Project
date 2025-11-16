<?php

namespace App\Livewire\User\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistTable extends Component
{

    public function removeFromWishlist($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        $this->dispatch('wishlist-deleted', 'Product removed from wishlist successfully');
        $this->dispatch('wishlist-refresh');
    }

    public function clearWishlist()
    {
        auth('web')->user()->wishlists()->delete();
        $this->dispatch('wishlist-deleted', 'Wishlist cleared successfully');
        $this->dispatch('wishlist-refresh');
    }
    public function render()
    {
        $wishlists = auth('web')->user()->wishlists()->with('product')->get();
        return view('livewire.user.wishlist.wishlist-table', compact('wishlists'));
    }
}
