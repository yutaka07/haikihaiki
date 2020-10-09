<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\User;
use App\Prefecture;
use App\Product;
use illuminate\Support\Facades\Storage; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $products = DB::table('products')->where('admin_id', '=', $id)->orderBy('id', 'desc')->get();
       
        return view('admin.home', ['products' => $products]);
    }


    public function edit(){
        $prefectures = Prefecture::all();
        $admin = Auth::user();
        return view('admin.edit', ['admin' => $admin, 'prefectures' => $prefectures]);
    }

    public function update(Request $request, $id){

        $admin = Admin::find($id);
        $admin->fill($request->all())->save();

        return redirect('admin/home');
    }

   
    }


