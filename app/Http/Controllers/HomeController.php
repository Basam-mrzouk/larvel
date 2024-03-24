<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{



    public function index()
    {
        $categoreis = DB::table('categories')->select('id','title_'.app()->getLocale() . " as title",'description_'.app()->getLocale() . " as description",'parent_id',"created_at","cate_image")->get();
        $products = Product::all();
        return view('home',['ahmed'=>$categoreis , "mohamed"=>$products]);
    }
}
