<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estate;

class AdvertControllers extends Controller
{
    //

    public function addstate(Request $request)
    {


        $area = $request->area;
        $numberRoom = $request->numberRoom;
        $textFee = $request->textFee;
        $textFee1 = $request->textFee1;
        $Advertiser = $request->Advertiser;
        $advert_id = $request->advert_id;


        $advert = new Estate();

        $advert->area = $area;
        $advert->room_number = $numberRoom;
        $advert->deposit = $textFee;
        $advert->rent = $textFee1;
        $advert->typeAdvert = $Advertiser;
        $advert->advert_id = $advert_id;

        if ($advert->save()) {
            return $advert;
        }


    }
}
