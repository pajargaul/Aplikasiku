<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\AdminResetPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AdminForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('admin.forgot-password');
    }

    public function reseturl(Request $request, $email)
    {
        $token =$email;
        $email = DB::table('admins')
        ->where('remember_token', $token)
        ->value('email');

        return view('admin.formresetpassword', [
            'request' => $request,
            'token' => $token,
            'email' => $email,
        ]);
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'remember_token',
        ]);
        $emailInput = $request->input('email');
        $token = Str::random(15);
        $resetUrl = url("admin/forgot-password/{$token}");
        $user = Admin::where('email', $emailInput)->first();
        if ($user) {
            DB::table('admins')
    ->where('email', $emailInput)
    ->update([
        'remember_token' => $token,
        'created_at' => now(),
    ]);
            Mail::to($user->email)->send(new AdminResetPassword($resetUrl));
            return redirect()->route('admin.password.request')->with('status', 'Tautan pengaturan ulang kata sandi berhasil dikirim ke email Anda.');
        } else {
            return redirect()->route('admin.password.request')->with('status', 'Alamat email salah. Silakan coba lagi.');
        }
    }

    protected function broker()
    {
        return Password::broker('admins');
    }

    public function processResetPassword(Request $request, $token, $email)
   {
    $request->validate([
        'password' => 'required|min:8',
    ]);

    $user = DB::table('admins')
        ->where('email', $email)
        ->where('remember_token', $token)
        ->first();

        if ($user) {
            // Update the password
            DB::table('admins')
                ->where('email', $email)
                ->update([
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->route('login_form')->with('status', 'Password reset successful. Please login with your new password.');
    } else {
        return redirect()->route('admin.password.reset')->with('status', 'Invalid email or token. Please try again or request a new password reset.');
   }
}
}
