<?php

namespace App\Http\Controllers\Admin;
use App\Models;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist']= Category::all();
        return view('backend.category',$data);     
    }

    public function postCate(AddCateRequest $request){
        $categories = new Category;
        $categories->cate_name = $request->name;
        $categories->cate_slug = str_slug($request->name);
        $categories->save();
        return back();
    }

    public function getEditCate($id){
        $data['cate'] = Category::find($id);
        return view('backend.editcategory',$data);
    }
    public function postEditCate(EditCateRequest $request,$id){
        $categories = Category::find($id);
        $categories->cate_name = $request->name;
        $categories->cate_slug = str_slug($request->name);
        $categories->save();
        return redirect()->intended('admin/category/');
    }

    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }

   
}
