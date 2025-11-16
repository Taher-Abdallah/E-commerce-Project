<?php

namespace App\Livewire\User;

use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $variantId;
    public $quantity;
    public $price;

    public function mount($product)
    {
        $this->product = $product;
        $this->variantId = $product->has_variants ? $this->product->productVariants->first()->id : null;
        $this->quantity = $product->has_variants ? $this->product->productVariants->first()->stock : $product->quantity;
        $this->price = $product->has_variants ? $this->product->productVariants->first()->price : $product->price;
    }

    public function changeVariant($variantId)
    {
        $variants=$this->product->productVariants->find($variantId);
        if(!$variants){
            return response()->json(['message' => 'Variant Not Found'], 404);
        }
        $this->changeProperitesValues($variants);

    }

    public function changeProperitesValues($variant)
    {
        $this->variantId = $variant->id;
        $this->quantity = $variant->stock;
        $this->price = $variant->price;
    }
    
    public function render()
    {
        return view('livewire.user.product-details',['variants'=>$this->product->productVariants]);
    }
}
