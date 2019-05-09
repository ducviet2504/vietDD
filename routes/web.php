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

Route::get('/', 'FrontendController@getHome');
Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');

Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');

Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');

Route::get('search','FrontendController@getSearch');

Route::group(['namespace' => 'Admin', 'prefix'=>'admin'], function(){
    Route::get('/login', 'LoginController@getLogin')->name('getlogin');
    Route::post('/login', 'LoginController@postLogin')->name('postlogin');
});


Route::get('/logout','HomeController@getLogout')->name('getLogout');

Route::group(['namespace' => 'Admin', 'prefix'=>'admin'], function(){
    Route::get('/home', 'HomeController@getHome')->name('getHome');

    Route::group(['prefix'=>'category'],function(){
        Route::get('/','CategoryController@getCate');
        Route::post('/','CategoryController@postCate');
        Route::get('edit/{id}','CategoryController@getEditCate');
        Route::post('edit/{id}','CategoryController@postEditCate');
        Route::get('delete/{id}','CategoryController@getDeleteCate');
    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('/','ProductController@getProduct');

        Route::get('add','ProductController@getAddProduct');
        Route::post('add','ProductController@postAddProduct');

        Route::get('edit/{id}','ProductController@getEditProduct');
        Route::post('edit/{id}','ProductController@postEditProduct');

        Route::get('delete/{id}','ProductController@getDeleteProduct');
    });

    
});

