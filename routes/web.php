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

// Route::get('/', function () {
//     dd(123);
//     // return view('template.pages.main');
//     // return view('auth.login');
// });

Route::get('/', 'FrontendController@index')->name('front.main');
// dd()
Route::get('/detail/{id}', 'FrontendController@detail')->name('front.detail');
Route::get('/define', 'FrontendController@getDefine')->name('front.define');
Route::get('/shirt-label', 'FrontendController@getShirtLabel')->name('front.shirt.label');





Auth::routes();
Route::post('/comment-shirt/store', 'FrontendController@storeComment')->name('front.shirt.comment');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/type-product', 'TypeProductController@index')->name('typeproduct.index');
Route::get('/type-product/create', 'TypeProductController@create')->name('typeproduct.create');
Route::post('/type-product/store', 'TypeProductController@store')->name('typeproduct.store');
Route::get('/type-product/edit/{id}', 'TypeProductController@edit')->name('typeproduct.edit');
Route::post('/type-product/update', 'TypeProductController@update')->name('typeproduct.update');
Route::get('/type-product/delete/{id}', 'TypeProductController@delete')->name('typeproduct.delete');


Route::group(['prefix' => 'product'], function() {
    Route::get('/','ProductController@index')->name('product.index');
    Route::get('/create','ProductController@create')->name('product.create');
    Route::post('/store','ProductController@store')->name('product.store');
    Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
    Route::post('/update','ProductController@update')->name('product.update');
    Route::get('/delete-image/{id}','ProductController@deleteImage')->name('product.deleteImage');
    Route::get('/delete/{id}','ProductController@delete')->name('product.delete');
    Route::get('/comment/{id}','ProductController@getComment')->name('product.comment');
});

Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');









