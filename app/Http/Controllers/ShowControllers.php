<?php

namespace App\Http\Controllers;

use App\Advert;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowControllers extends Controller
{

    public function index($city)
    {
        $advert =  $this->joinTables();
        return view('show', ['advert' => $advert]);
    }

    public function showadvert()

    {
        $advert =  $this->joinTables();

        return ($advert);
    }

    public function joinTables()
    {
        $advert = DB::table('adverts')
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->get();
        return $advert;
    }
}
