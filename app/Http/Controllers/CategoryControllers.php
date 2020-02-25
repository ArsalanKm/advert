<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class CategoryControllers extends Controller
{
    //
    public function index()

    {
        $data = Category::all();
        return view('admin.category.index',['categories'=>$data]);
    }

    public function addcategory(Request $request)
    {

        $data = $request->all();
        $c = Category::create($data);
        if ($c)
            return $c;
    }

    public function getcategories()
    {
      return  response()->json(Category::orderby('id','asc')->get());

    }

    public function removecategory(Request $request){
        $c=Category::find($request->id)->delete();
        return "ok";
    }
}
