<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Services\CouponService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    protected $couponService;
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    public function getDataTaBle()
    {
        return $this->couponService->getDataTable();
    }
    public function index()
    {
        return view('admin.coupons.index');
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(CouponRequest $request)
    {
        Coupon::create($request->validated());
        return redirect()->route('admin.coupons.index')->with('success','Coupon Created Successfully');
    }

    public function edit(string $id)
    {
        $coupon=Coupon::findOrFail($id);
        return view('admin.coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        $coupon=Coupon::findOrFail($id);
        $coupon->update($request->validated());
        return redirect()->route('admin.coupons.index')->with('success','Coupon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon=Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success','Coupon Deleted Successfully');
    }
}
