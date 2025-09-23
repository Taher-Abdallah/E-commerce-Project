<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('admin.auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $email = $request->session()->get('otp_email');
        $admin = Admin::where('email', $email)->first();

        if ($admin) {
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
            $request->session()->forget('otp_email');

            return to_route('admin.login')->with('status', 'تم تغيير كلمة المرور بنجاح');
        }

        return back()->withErrors(['email' => 'المستخدم غير موجود']);
    }
}
