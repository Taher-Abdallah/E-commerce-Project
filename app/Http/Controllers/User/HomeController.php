<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

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
}
