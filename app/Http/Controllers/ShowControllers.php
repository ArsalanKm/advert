<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowControllers extends Controller
{

    public function index($city)
    {

        return view('show');
    }

    public function showadvert()

    {
        $advert = DB::table('adverts')
            ->leftjoin('images', 'adverts.id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.id', '=', 'estates.advert_id')
            ->get();

        return ($advert);
    }
}
