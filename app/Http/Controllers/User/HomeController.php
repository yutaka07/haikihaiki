<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Product;
use App\Prefecture;
use App\Admin;
use App\Buyproduct;
use App\Mail\BuyEmail;
use App\Mail\SellEmail;
use App\Mail\BuyCancelEmail;
use App\Mail\SellCancelEmail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $products = DB::table('buyproducts')->join('products', 'buyproducts.product_id', '=', 'products.id')->where([['buyproducts.user_id', '=', $id], ['buyproducts.delete_flg', '=', '0'],])->orderBy('products.id', 'desc')->get();

        $admins = admin::all();

        return view('user.home', ['products' => $products, 'admins' => $admins]);
    }
    
    public function top(){
        $products = DB::table('products')->join('admins', 'products.admin_id', '=', 'admins.id')->select('products.*', 'admins.prefectures_id', 'admins.branch')->orderBy('id', 'desc')->get();
        $prefectures = Prefecture::all();
        $admins = Admin::all();
        return view('user.top', ['products' => $products, 'prefectures' => $prefectures, 'admins' => $admins]);
    }

    public function edit(){
      
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id){

        $user = User::find($id);
        $user->fill($request->all())->save();

        return redirect('user/home');
    }

    public function buy(Request $request){
        $id = $request->productid;
        $product = Product::find($id);
        $product->buy_flg = true;
        $product->save();

        $buyproduct = new Buyproduct();
        $buyproduct->product_id = $id;
        $buyproduct->user_id = Auth::user()->id;
        $buyproduct->save();

        $admin = Admin::find($product->admin_id);

        $user = Auth::user();


        Mail::to($user)->send(new BuyEmail($user, $admin, $product));

        Mail::to($admin)->send(new SellEmail($user, $admin, $product));
        
        return redirect('user/home');
    }

    public function cancel(Request $request){
        $id = $request->productid;
        $product = Product::find($id);
        $product->buy_flg = false;
        $product->save();

        $buyproduct = Buyproduct::where([['product_id', $id],['delete_flg', '0']])->first();
        $buyproduct->delete_flg = true;
        $buyproduct->save();

        $admin = Admin::find($product->admin_id);

        $user = Auth::user();

        Mail::to($user)->send(new BuyCancelEmail($user, $admin, $product));

        Mail::to($admin)->send(new SellCancelEmail($user, $admin, $product));

        return redirect('user/home');

    }
}
