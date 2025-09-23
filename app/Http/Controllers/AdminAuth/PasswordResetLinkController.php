<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use App\Notifications\ResetPasswordNotification;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // هل الايميل موجود؟
        $admin = Admin::where('email', $request->email)->first();

        if (! $admin) {
            return back()->withErrors(['email' => 'الايميل غير موجود عندنا.']);
        }


        // توليد OTP
        $otp = new Otp;
        $otpData = $otp->generate($request->email, 'numeric', 5, 10);
        $request->session()->put('otp_email', $request->email);


        // إرسال النوتيفيكشن
        $admin->notify(new ResetPasswordNotification($otpData->token));

        return to_route('admin.otp.verfiy', ['email' => $request->email]);

        // // توليد OTP
        // $otp = new Otp;
        // $otpData = $otp->generate($request->email, 6, 10);
        // // 6 أرقام وصالح 10 دقايق

        // // إرسال الايميل بالـ OTP
        // Mail::to($request->email)->send(new ResetPasswordNotification($otpData->token));


    }
}
