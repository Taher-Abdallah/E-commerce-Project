<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class PermissionHelper
{
    public static function hasPermission($permission)
    {
        return Auth::guard('admin')->user()->hasAccess($permission)?true:false;
    }
}
