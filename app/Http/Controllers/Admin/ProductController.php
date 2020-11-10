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
        $date = date('Y-m-d\TH:i');
        return view('admin.products.registproduct', ['date' => $date]);
    }

    public function create(Request $request){

        //バリデーション
        $request->validate([
            'name' => 'required | string | max : 190',
            'expiration_date' => 'required | date',
            'price' => 'required | integer | max : 999999',
            'comment' => 'required | string | max : 190',
            'photofile' => 'required | image ',
           
        ]);

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

        return redirect('/admin/home')->with('flash_message', '登録しました');
       
    }

    public function destroy(Request $request){
        //商品削除
        Product::find($request->productid)->delete();
        return response()->json(['success'=>'削除しました']);
      }  

      public function edit($id){
          $product = Product::find($id);
          if($product->admin_id === Auth::user()->id && $product->buy_flg === 0){
              //商品の消費期限の文字列を変更
              $a = mb_substr($product['expiration_date'], 0, 10);
              $b = 'T';
              $c = mb_substr($product['expiration_date'], 11);
              $date = $a.$b.$c;
    
              return view('admin.products.editproduct',['product' => $product, 'date' => $date]);
        }else{
            return redirect('/admin/home');
          }
      }

      public function update(Request $request, $id){

        //バリデーション
        $request->validate([
            'name' => 'required | string | max : 190',
            'expiration_date' => 'required',
            'price' => 'required | integer | max : 999999',
            'comment' => 'required | string | max : 190',
            'photofile' => ' image ',
           
        ]);

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

        return redirect('/admin/home')->with('flash_message', '更新しました');

      }
}


