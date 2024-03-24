<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//categories table routes

Route::get("/alldata","API\CategoryController@index");

Route::get("/showone/{id}","API\CategoryController@show");

Route::post("/create","API\CategoryController@store");

Route::post("/delete","API\CategoryController@delete");

Route::post("/update","API\CategoryController@update");





