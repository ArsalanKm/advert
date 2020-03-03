<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;

class ManageControllers extends Controller
{

    public function index($category_id, $id)
    {

         $advert = Advert::find($id);
        return view('manage', ['advert' => $advert,'id'=>$id]);

    }

}
