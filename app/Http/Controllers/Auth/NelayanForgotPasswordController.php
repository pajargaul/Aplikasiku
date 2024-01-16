<?php

namespace App\Http\Controllers\Auth;

use App\Models\Nelayan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\NelayanResetPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class NelayanForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('nelayan.forgot-password');
    }

    public function reseturl(Request $request, $email)
    {
        $token =$email;
        $email = DB::table('nelayans')
        ->where('remember_token', $token)
        ->value('email');

        return view('nelayan.formresetpassword', [
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
        $resetUrl = url("nelayan/forgot-password/{$token}");
        $user = Nelayan::where('email', $emailInput)->first();
        if ($user) {
            DB::table('nelayans')
    ->where('email', $emailInput)
    ->update([
        'remember_token' => $token,
        'created_at' => now(),
    ]);
            Mail::to($user->email)->send(new NelayanResetPassword($resetUrl));
            return redirect()->route('nelayan.password.request')->with('status', 'Tautan pengaturan ulang kata sandi berhasil dikirim ke email Anda.');
        } else {
            return redirect()->route('nelayan.password.request')->with('status', 'Alamat email salah. Silakan coba lagi.');
        }
    }

    protected function broker()
    {
        return Password::broker('nelayans');
    }

    public function processResetPassword(Request $request, $token, $email)
   {
    $request->validate([
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password|min:8',
    ], [
        'password.required' => 'Kata sandi wajib diisi.',
        'password.min' => 'Kata sandi minimal harus 8 karakter.',
        'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
        'password_confirmation.same' => 'Konfirmasi kata sandi harus sama dengan kata sandi.',
        'password_confirmation.min' => 'Konfirmasi kata sandi minimal harus 8 karakter.',
    ]);

    $user = DB::table('nelayans')
        ->where('email', $email)
        ->where('remember_token', $token)
        ->first();

        if ($user) {
            // Update the password
            DB::table('nelayans')
                ->where('email', $email)
                ->update([
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->route('nelayan.login_form')->with('status', 'Password reset successful. Please login with your new password.');
    } else {
        return redirect()->route('nelayan.password.reset')->with('status', 'Invalid email or token. Please try again or request a new password reset.');
   }
}
}
