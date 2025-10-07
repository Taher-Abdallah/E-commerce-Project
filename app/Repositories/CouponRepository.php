<?php

namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository
{
    /**
     * Create a new class instance.
     */
    public function getDataTable()
    {
        return Coupon::Latest()->get();
    }
}
