<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::get();
        return view('user.brand',get_defined_vars());
    }

    public function showBrands($slug) //show the products of brand like nike or ste ..
    {
        $brands=Brand::where('slug',$slug)->first();
        $products = $brands->products()->with(['productImages','brand','category'])->paginate(5);
        $flashTimer = false; // لأن دي مش flash timer
        return view('user.products', get_defined_vars());
    }

    public function showCategory($slug) //show the products of category like electronics , fashion ..
    {
        $category = Category::where('slug', $slug)->firstOrFail();
                $products = $category->products()->with(['productImages', 'brand', 'category'])->paginate(5);
        $flashTimer = false; // لأن دي مش flash timer
        return view('user.products', get_defined_vars());
    }

    public function category()
    {
        $categories = Category::get();
        return view('user.category', get_defined_vars());
    }
}
