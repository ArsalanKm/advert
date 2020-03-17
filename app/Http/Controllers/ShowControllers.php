<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return ($advert);
    }

    public function joinTables()
    {
        $advert = DB::table('adverts')
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->paginate(3);
        return $advert;
    }

    public function show_cat(Request $request)

    {
        $id = $request->Myid;
        $subcat = Category::where('parent_id', $id)->where('parent_id', '!=', 0)->get();

        return response()->json($subcat);
    }

    public function show(Request $request){
        $advert = DB::table('adverts')->where('adverts.Id',$request->Myid)
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->get();
        return $advert;
    }
}
