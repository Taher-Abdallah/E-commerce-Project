<?php

namespace App\Livewire\User;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Coupon as ModelsCoupon;

class Coupon extends Component
{
    public $code;
    public $cart;
    public $cartItemsCount=0;
    public $couponInfo=null;
    #[On('order-summary-refresh')]
    public function mount(){
        $this->cart=Cart::where('user_id', auth('web')->user()->id)->first();
        $this->cartItemsCount= $this->cart->cartItems()->count() ?? 0;
        
        if($this->cart->coupon != null){
            $couponObj= ModelsCoupon::valid()->where('code', $this->cart->coupon)->first();
            if($couponObj){
                $this->couponInfo= "Coupon Applied With Discount  $couponObj->discount_percentage % , Coupon Code is $couponObj->code, Expiry Date is $couponObj->end_data";
            }

        }

    }
    public function applyCoupon()
    {
        if(!$this->checkCouponValid($this->code)){
            $this->dispatch('coupon-error', 'Invalid Coupon');
            return;
        }
        //if the code was right store in cart
        $cart=Cart::where('user_id', auth('web')->user()->id)->first();
        $cart->update(['coupon'=> $this->code]);
        //decrease number of use of this coupon
        $couponObj=ModelsCoupon::where('code', $this->code)->first();
        $couponObj->update(['time_used'=>$couponObj->time_used+1]);

        //then show the message
        $this->couponInfo= "Coupon Applied With Discount  $couponObj->discount_percentage % , Coupon Code is $couponObj->code";
        $this->dispatch('coupon-success', $this->couponInfo);

    }

    public function checkCouponValid($code){
        $couponObj= ModelsCoupon::where('code', $code)->first();
        if(!$couponObj){
            return false;
        }
        if(!$couponObj->CopuonValid()){
            return false;
        }
        return $couponObj;

    }
    public function render()
    {
        return view('livewire.user.coupon');
    }
}
