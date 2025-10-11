<?php

namespace App\Services;

use App\Models\Coupon;
use App\Repositories\CouponRepository;
use Yajra\DataTables\DataTables;

class CouponService
{
    /**
     * Create a new class instance.
     */
    protected $couponRepository;
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }


    public function getDataTable()
    {
        $coupon=$this->couponRepository->getDataTable();
        return DataTables::of($coupon)
            ->addIndexColumn()
            ->addColumn('action',function ($coupon){
                return view('admin.coupons.datatables.action',compact('coupon'));
            })
            ->editColumn('discount_percentage',function ($coupon){
                return $coupon->discount_percentage.'%';
            })
            ->editColumn('is_active',function ($coupon){
                return $coupon->StatusTranslate();
            })
            ->make(true);
    }
}
