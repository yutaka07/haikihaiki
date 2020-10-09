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

        return redirect('/admin/home')->with('flash_message', __('Registered.'));
       
    }

    public function destroy(Request $request){
        Product::find($request->productid)->delete();
        return redirect('/admin/home')->with('flash_message', __('Deleted.'));
      }  

      public function edit($id){
          $product = Product::find($id);

          $a = mb_substr($product['expiration_date'], 0, 10);
          $b = 'T';
          $c = mb_substr($product['expiration_date'], 11);
          $date = $a.$b.$c;

          return view('admin.products.editproduct',['product' => $product, 'date' => $date]);
      }

      public function update(Request $request, $id){
        
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

        return redirect('/admin/home')->with('flash_message', __('Registered.'));

      }
}


