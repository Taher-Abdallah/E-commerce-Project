<?php

namespace App\Http\Controllers\AdminAuth;

use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtpController extends Controller
{
    public function create($email)
    {
        return view('admin.auth.otp-password', ['email' => $email]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'token' => ['required','min:5'],
        ]);

        $otp2=(new Otp)->validate($request->email, $request->token);

        return to_route('admin.password.reset');
    }
}
