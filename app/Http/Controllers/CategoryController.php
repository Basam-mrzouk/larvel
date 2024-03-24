<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        return view('Category');
    }

    public function show($category_id){
        $cate = Category::findOrFail($category_id);
        return view ('categories.show',['jony'=>$cate]);
    }
    public function delete ($category_id){
        $cate= Category::findOrFail($category_id);

        if(File::exists(public_path('categories/image/'.$cate->cate_image))){
            File::delete(public_path('categories/image/'.$cate->cate_image));
            }else{
            dd('File does not exists.');
            }
        $cate->delete();
        return redirect()->route('home');
    }

    public function create(){
        $category= Category::all();
        return view('categories.create',['categories'=>$category]);
    }


    public function save (CategoryRequest $request){

        $imageName ="";
        if($request->hasFile('cate_image')){
            $image = $request->cate_image;
            $imageName = time()."_".rand(0,1000) ."." .$image->extension() ;   //324234_954.png
            $image->move( public_path('categories/image'),$imageName);
        }

        Category::create([
            "cate_image" => $imageName,
            "id" => $request->id,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "parent_id" => $request->parent_id,

        ]);
        return redirect()->route('home')->with('success',"Created Category success");

    }


    public function edit ($id){
        $allproduct = Category::all();
        $categories = Category::findOrFail($id);
        return view ('categories.edit',['categories'=>$categories,"allproduct"=>$allproduct]);
    }


    public function update(CategoryRequest $request){

        $category_id = $request->old_id;
        $ahmed = Category::findOrFail($category_id);
        $imageName ="";
        if($request->hasFile('cate_image')){
            $image = $request->cate_image;
            $imageName = time()."_".rand(0,1000) ."." .$image->extension() ;   //324234_954.png
            $image->move( public_path('categories/image'),$imageName);
        }


        $ahmed->update([
            "cate_image" => $imageName,
            "id" => $request->id,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "parent_id" => $request->parent_id,

        ]);
        return redirect()->route('home')->with('success',"updated Category success");


    }

}
