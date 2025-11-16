<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getProductType($type)
    {
        if($type == 'new-arrival'){
            $products = Product::with('productImages', 'brand', 'category')->latest()->active()->paginate(8);
        }else if($type == 'flash-sale'){
            $products = Product::with('productImages', 'brand', 'category')->where('has_variants',0)->latest()->active()->paginate(8);
        }else if($type ==  'flash-timer'){
            $products = Product::where('available_for', date('Y-m-d'))->whereNotNull('available_for')->paginate(8);
        }else{
            abort(404);
        }
        $flashTimer = $type == 'flash-timer' ? true : false;
        return view('user.products', get_defined_vars());
    }

    public function showProductPage($slug)
    {
        $product = Product::with('brand', 'category', 'productImages', 'productVariants', 'productPreviews')
        ->where('slug', $slug)->active()->firstOrFail();
            $categoryId = Product::where('slug', $slug)->firstOrFail();
            $relatedProducts = Product::with('productImages', 'brand', 'category')
            ->where('category_id', $categoryId->category_id)
            ->where('id', '!=', $categoryId->id)
            ->active()->limit(4)->get();
            $flashTimer = false;
        return view('user.product-info', get_defined_vars());
    }

    public function getRelatedItems($slug) //get by category
    {
        $categoryId = Product::where('slug', $slug)->firstOrFail();
        $products = Product::with('productImages', 'brand', 'category')
        ->where('category_id', $categoryId->category_id)
        ->where('id', '!=', $categoryId->id)
        ->active()->paginate(20);
        $flashTimer = false;
        return view('user.products', get_defined_vars());
    }

    
}
