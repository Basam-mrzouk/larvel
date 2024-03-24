<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ //...

    Route::group(["middleware"=>"checkAdmin"],function(){

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/category','CategoryController@index')->name('cate');
        Route::get('/product','ProductController@index')->name('pro');

        //categories crud opreation
        Route::get('/categories/show/{id}','CategoryController@show')->name('categories.show');
        Route::get('/categories/delete/{id}','CategoryController@delete')->name('categories.delete');
        Route::get('/categories/create','CategoryController@create')->name('categories.create');
        Route::get('/categories/edit/{id}','CategoryController@edit')->name('categories.edit');
        Route::post('/categories/save','CategoryController@save')->name('categories.save');
        Route::post('/categories/update','CategoryController@update')->name('categories.update');

    });


});
