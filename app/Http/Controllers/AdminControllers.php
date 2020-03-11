<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class AdminControllers extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function advert()
    {


        $advert = Advert::orderby('id', 'desc')->paginate(10);
        return view("admin.advert.index", ['advert' => $advert]);
    }

    public function removeadvert(Request $request)
    {
        $id = $request->advert_id;
        $advert = Advert::find($id)->delete();
        if ($advert) {
            return redirect("admin/advert");
        }

    }

// if 2 tayid shode if 3 tayid nashode
    public function status(Request $request)
    {
        $advert = Advert::find($request->id);
        if ($advert->check == 1) {
            $ad = Advert::where('id', $request->id)->update([
                'check' => 0
            ]);
        } else {
            $ad = Advert::where('id', $request->id)->update([
                'check' => 1
            ]);
        }
        return $ad;
    }
}
