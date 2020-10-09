<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function showResetForm(Request $request, $token = null)
    {
        // 一般ユーザ用のviewを指定
        return view('user.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function broker()
    {
        // 一般ユーザ用のパスワードブローカーを指定
        return Password::broker('users');
    }
}
