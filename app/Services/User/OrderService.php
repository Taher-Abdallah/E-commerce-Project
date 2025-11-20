<?php

namespace App\Services\User;

use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\ShippingGovernorate;

class OrderService
{

    public function createOrder($data){
        $countryName=$this->getLocationName($data['country_id'], Country::class);
        $governorateName=$this->getLocationName($data['governorate_id'], Governorate::class);
        $cityName=$this->getLocationName($data['city_id'], City::class);

        if(!$countryName || !$governorateName || !$cityName){
            return null;
        }

        $cart = $this->getCart();
        if(!$cart || $cart->cartItems->isEmpty()){
            return null;
        }

        $subTotal=$cart->cartItems->sum(fn($item) => $item->price * $item->quantity);
        $shippingPrice=ShippingGovernorate::where('governorate_id', $data['governorate_id'])->first()->price;
        
        // check if coupon exists  
        if($coupon_exists=$cart->coupon != null){
            $couponObj= Coupon::valid()->where('code', trim($cart->coupon, ' '))->first();
            if($couponObj){
                $subTotal=$subTotal-($subTotal * $couponObj->discount_percentage/100);
            }
            
        }
        $totalPrice = $subTotal + $shippingPrice;

        $order= Order::create([
            'user_id' => auth('web')->user()->id,
            'user_name'=> $data['fname'] . ' ' . $data['lname'],
            'user_email'=> $data['user_email'],
            'user_phone'=> $data['user_phone'],
            'price'=> $subTotal,
            'shapping_price'=> $shippingPrice,
            'total_price'=> $totalPrice,
            'note'=> $data['note'],
            'street'=> $data['street'],
            'country'=> $countryName,
            'governorate'=> $governorateName,
            'city'=> $cityName,
            'coupon'=> $coupon_exists && $couponObj ? $couponObj->code : null,
            'coupon_discount' => $coupon_exists && $couponObj ? $couponObj->discount_percentage : 0,
        ]);

        $this->storeOrderFromCart($order, $cart);
        return $order;
        // $this->clearUserCart($cart);


    }

    private function clearUserCart($cart){
        $cart->cartItems()->delete();
        $cart->update(['coupon' => null]);
    }

    private function storeOrderFromCart($order, $cart){
        foreach($cart->cartItems as $item){
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'product_variant_id' => $item->product_variant_id,
                'product_name' => optional($item->product)->name?? 'Unknown Product',
                'product_desc'=> optional($item->product)->small_desc?? ' ',
                'product_quantity' => $item->quantity,
                'product_price' => $item->price,
                'attributes' => json_encode($item->attributes),
                
            ]);
        }
    }

    public function getCart(){
        return Cart::with('cartItems.product')->where('user_id', auth('web')->user()->id)->first();
    }

    public function getLocationName($id, $modelName){
        $location = $modelName::find($id);
        return $location->name;
    }


}
