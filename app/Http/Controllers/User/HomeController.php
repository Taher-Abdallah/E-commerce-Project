<?php

namespace App\Http\Controllers\User;

use App\Models\Faq;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
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
