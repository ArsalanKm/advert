<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    //

    public function advert()
    {


        $category = Category::orderBy('id', 'asc')->get();

        return view('advert', ['category' => $category]);
    }

    public function AdvertParent(Request $request)
    {

        $id = $request->id;
        $category = Category::find($id);
        return response()->json($category);

    }

    public function Sendsubmenu(Request $request)
    {
        $id = $request->id;

        $category = Category::where('parent_id', $id)->get();
        return response()->json($category);


    }

    public function subcats(Request $request)
    {
        $id = $request->id;
        $category = Category::where('parent_id', $id)->get();
        return response()->json($category);
    }

    public function catmenus(Request $request)
    {
        $id = $request->id;
        $cat = Category::find($id);
        return response()->json($cat);

    }

    public function send_advert2(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        return response()->json($category);

    }
}

