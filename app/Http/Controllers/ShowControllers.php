<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ShowControllers extends Controller
{

    public function index($city)
    {
        $advert = $this->joinTables();
        return view('show', ['advert' => $advert, 'city' => $city]);
    }

    public function showadvert()

    {
        $advert = $this->joinTables();

        return response()->json($advert);
    }

    public function joinTables()
    {
        $advert = DB::table('adverts')
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')

            ->paginate(3);
        return $advert;
    }

    public function show_cat(Request $request)

    {
        $id = $request->Myid;
        $subcat = Category::where('parent_id', $id)->where('parent_id', '!=', 0)->get();

        return response()->json($subcat);
    }

    public function show(Request $request)
    {
        $advert = DB::table('adverts')->where('adverts.Id', $request->Myid)
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->get();
        return $advert;
    }

    public function addfavorite(Request $request)
    {
        $id = $request->id;
        $advert = DB::table('adverts')->where('adverts.Id', $id)
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->get();
//        return $show = Session::put('show', $advert);
        if (session::has('show')) {

            $cart = Session::get('show');
            if (array_key_exists($id, $cart)) {
                $cart[$id];

            } else {
                $cart[$id] = 1;
                Session::put('show', $cart);
            }
        } else {
            $cart = array();
            $cart[$id] = 1;
            Session::put('show', $cart);
        }

        return $cart;
    }
}
