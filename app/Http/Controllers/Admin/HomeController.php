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
        //adminのid取得
        $id = Auth::user()->id;
        //idと同じ商品情報取得
        $products = DB::table('products')->where('admin_id', '=', $id)->orderBy('id', 'desc')->get();
       
        return view('admin.home', ['products' => $products]);
    }


    public function edit(){
        //都道府県情報取得
        $prefectures = Prefecture::all();
        //admin情報取得
        $admin = Auth::user();
        return view('admin.edit', ['admin' => $admin, 'prefectures' => $prefectures]);
    }

    public function update(Request $request, $id){

         //バリデーション
         $request->validate([
            'name'     => ['required', 'string', 'max:190'],
            'prefectures_id'     => ['required'],
            'branch'     => ['required', 'string', 'max:190'],
            'address'     => ['required', 'string', 'max:190'],
            'email'    => ['required', 'string', 'email', 'max:190', 'unique:admins,email,'.Auth::user()->id.',id',
            ],
           
        ]);

        //adminの情報更新
        $admin = Admin::find($id);
        $admin->fill($request->all())->save();

        return redirect('admin/home')->with('flash_message', '更新しました');
    }

    public function top(){
        //商品情報取得
        $products = DB::table('products')->join('admins', 'products.admin_id', '=', 'admins.id')->select('products.*', 'admins.prefectures_id', 'admins.branch')->orderBy('id', 'desc')->get();
        //都道府県情報取得
        $prefectures = Prefecture::all();
        //admin情報取得
        $admins = Admin::all();
        return view('admin.top', ['products' => $products, 'prefectures' => $prefectures, 'admins' => $admins]);
    }

   
    }


