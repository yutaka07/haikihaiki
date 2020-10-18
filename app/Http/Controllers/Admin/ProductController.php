<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use App\Prefecture;
use App\Product;
use Storage; 
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
   
    public function regist(){

        return view('admin.products.registproduct');
    }

    public function create(Request $request){
       //商品登録
        $product = new Product();
        $product->name = $request->name;
        $product->expiration_date = $request->expiration_date;
        $product->price = $request->price;
        $product->comment = $request->comment;
        $product->admin_id = Auth::user()->id;
        $image = $request->file('photofile');
       
        $path = Storage::disk('s3')->put('/haiki', $image, 'public');

        $product->photofile = Storage::disk('s3')->url($path);
        $product->save();

        return redirect('/admin/home');
       
    }

    public function destroy(Request $request){
        //商品削除
        Product::find($request->productid)->delete();
        return redirect('/admin/home');
      }  

      public function edit($id){
          $product = Product::find($id);
          //商品の消費期限の文字列を変更
          $a = mb_substr($product['expiration_date'], 0, 10);
          $b = 'T';
          $c = mb_substr($product['expiration_date'], 11);
          $date = $a.$b.$c;

          return view('admin.products.editproduct',['product' => $product, 'date' => $date]);
      }

      public function update(Request $request, $id){
        //商品情報更新
        $product = Product::find($id);
        $product->name = $request->name;
        $product->expiration_date = $request->expiration_date;
        $product->price = $request->price;
        $product->comment = $request->comment;
        $image = $request->file('photofile');
       if(!empty($image)){
           $path = Storage::disk('s3')->put('/haiki', $image, 'public');
   
           $product->photofile = Storage::disk('s3')->url($path);
       }
        $product->save();

        return redirect('/admin/home');

      }
}


