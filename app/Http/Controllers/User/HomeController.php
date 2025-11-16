<?php

namespace App\Http\Controllers\User;

use App\Models\Faq;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    
    public function index()
    {
        $categories=Category::limit(12)->get();
        $brands=Brand::limit(12)->get();
        $newArrivals= Product::with('productImages','brand','category')->latest()->active()->limit(8)->get();
        $flashTimer=Product::where('available_for',date('Y-m-d'))->whereNotNull('available_for')->limit(8)->get();
        $flashProducts= Product::with('productImages','brand','category')->where('has_variants',0)->latest()->active()->limit(8)->get();
        $sliders=Slider::all();
        return view('user.index',get_defined_vars());
    }

    public function profile()
    {
        return view('user.user-dashboard');
    }

    public function faqs()
    {
        $faqs=Faq::limit(5)->get();
        return view('user.faq',get_defined_vars());
    }

    public function terms()
    {
        return view('user.terms');
    }
    public function privacy()
    {
        return view('user.privacy');
    }
}
