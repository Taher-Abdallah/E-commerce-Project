<?php

namespace App\Http\Controllers\User;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Services\User\OrderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderShippingRequest;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckoutController extends Controller
{
    public $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService=$orderService;
    }
    public function index()
    {
        return view('user.checkout');
    }


    public function store(OrderShippingRequest $request)
    {
        $data=$request->validated();

        $order=$this->orderService->createOrder($data);
        if(!$order){
            session()->flash('error', 'Cart is empty');
            return redirect()->back();
        }
        session()->flash('success', 'Order created successfully');
        return redirect()->back();
    }
}
