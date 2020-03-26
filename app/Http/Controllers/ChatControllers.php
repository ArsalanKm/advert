<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatControllers extends Controller
{
    //
    public function index($id)
    {
        $advert = DB::table('adverts')->where('adverts.Id', $id)
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->leftjoin('chats', 'adverts.Id', '=', 'chats.advert_id')
            ->get();

        return view('chat', ['id' => $id, 'advert' => $advert]);
    }

}
