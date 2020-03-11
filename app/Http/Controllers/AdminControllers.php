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
}
