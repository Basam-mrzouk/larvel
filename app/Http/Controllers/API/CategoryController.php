<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    //show all data
    public function index(){
        $categories = CategoryResource::collection(Category::all());
        $data = [
            "msg"=>"return All data From DB",
            "status"=>200,
            "data"=>$categories
        ];
        return response()->json($data);

    }

    //show one Record Of Data
    public function show($id){

        $category = Category::find($id);

        if($category){
        $data = [
            "msg"=>"return one Record From DB",
            "status"=>200,
            "data"=> new CategoryResource($category)
        ];
        return response()->json($data);

        }else{
            $data = [
                "msg"=>"No Such ID",
                "status"=>201,
                "data"=> null
            ];
            return response()->json($data);
        }

    }


    // create new category

    public function store(Request $request){


        $validateData = Validator::make($request->all(),[
            'id' => 'required|max:11',
            'title_en' => 'required|min:5|max:255',
            'title_ar' => 'required|min:5|max:255',
            'description_en' => 'required|min:10|max:255',
            'description_ar' => 'required|min:10|max:255',
            'parent_id' => 'required|max:255',
            'cate_image' => 'required|image|mimes:png,jpeg,jpg,gif|max:2048',

        ]);

            if($validateData->fails()){

                $data = [
                    "msg"=>"No Valid Data",
                    "status"=>203,
                    "data"=> $validateData->errors()
                ];
                return response()->json($data);

            }

        $imageName ="";
        if($request->hasFile('cate_image')){
            $image = $request->cate_image;
            $imageName = time()."_".rand(0,1000) ."." .$image->extension() ;   //324234_954.png
            $image->move( public_path('categories/image'),$imageName);
        }

       $final= Category::create([
            "cate_image" => $imageName,
            "id" => $request->id,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "parent_id" => $request->parent_id,

        ]);

        $data = [
            "msg"=>"Created new Record Success",
            "status"=>200,
            "data"=> new CategoryResource($final)
        ];
        return response()->json($data);






    }


    //delete One Record Form DB

     public function delete (Request $request){
        $id = $request->id;
        $category = Category::find($id);
        if(File::exists(public_path('categories/image/'.$category->cate_image))){
            File::delete(public_path('categories/image/'.$category->cate_image));
            }

        $category->delete();
        $data = [
            "msg"=>"Deleted Successfully",
            "status"=>205,
            "data"=> null
        ];
        return response()->json($data);

     }



     //update one Record from db

     public function update(Request $request){


        $validateData = Validator::make($request->all(),[
            'id' => 'required|max:11',
            'title_en' => 'required|min:5|max:255',
            'title_ar' => 'required|min:5|max:255',
            'description_en' => 'required|min:10|max:255',
            'description_ar' => 'required|min:10|max:255',
            'parent_id' => 'required|max:255',
            'cate_image' => 'required|image|mimes:png,jpeg,jpg,gif|max:2048',

        ]);

            if($validateData->fails()){

                $data = [
                    "msg"=>"No Valid Data",
                    "status"=>203,
                    "data"=> $validateData->errors()
                ];
                return response()->json($data);

            }


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

        $data = [
            "msg"=>"updated successfully",
            "status"=>207,
            "data"=> new CategoryResource($ahmed)
        ];
        return response()->json($data);




     }



    }
