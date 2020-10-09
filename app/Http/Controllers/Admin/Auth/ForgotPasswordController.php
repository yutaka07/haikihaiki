<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    // 管理者ユーザ用のviewを指定
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }
    public function broker()
    {
        // 管理者ユーザ用のパスワードブローカーを指定
        return Password::broker('admins');
    }
}
