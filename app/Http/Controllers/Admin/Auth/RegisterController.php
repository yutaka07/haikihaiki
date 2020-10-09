<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Prefecture;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showRegistrationForm()
    {
        $prefectures = Prefecture::all();
        return view('admin.auth.register', ['prefectures' => $prefectures]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'prefectures_id'     => ['required'],
            'branch'     => ['required', 'string', 'max:255'],
            'address'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Admin::create([
            'name'     => $data['name'],
            'prefectures_id'     => $data['prefectures_id'],
            'branch'     => $data['branch'],
            'address'     => $data['address'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}