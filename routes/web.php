<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');


// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false
    ]);


    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

       
        
        Route::get('/top', 'HomeController@top')->name('top');

        Route::post('/top', 'HomeController@buy');

        Route::post('/home', 'HomeController@cancel');

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/home/edit', 'HomeController@edit')->name('edit');
        Route::post('/home/{id}', 'HomeController@update')->name('update');

    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        Route::get('/top', 'HomeController@top')->name('top');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/edit', 'HomeController@edit')->name('edit');
        Route::post('/edit/{id}', 'HomeController@update')->name('update');
        
        Route::get('/products/registproduct', 'ProductController@regist')->name('products.registproduct');
        Route::get('/products/editproduct/{id}', 'ProductController@edit')->name('products.editproduct');
        Route::post('/products/editproduct/{id}', 'ProductController@update')->name('products.update');
        Route::post('/home', 'ProductController@create')->name('products.create');
        
        Route::post('/home/delete', 'ProductController@destroy');

    });

});