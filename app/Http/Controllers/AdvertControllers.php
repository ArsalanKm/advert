<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Estate;
use App\Advert;

class AdvertControllers extends Controller
{
    //

    public function addstate(Request $request)
    {


        $area = $request->area;
        $city = $request->city;

        $numberRoom = $request->numberRoom;

        $textFee = $request->textFee;
        $textFee1 = $request->textFee1;

        $Advertiser = $request->Advertiser;
        $advert_id = $request->advert_id;

        $mobile = $request->mobile;
        $chat = $request->chat;

        $email = $request->email;
        $checkemail = $request->checkemail;

        $titleAdvert = $request->titleAdvert;
        $text = $request->text;

        $typeAdvert = $request->TypeAdvert;


        /* this is for saving in the Estate table in the Database*/


        /* this is for saving advert in adverts table*/
        $ad = new Advert();

        $ad->city = $city;

        $ad->email = $email;

        $ad->chat = $chat;

        $ad->noemail = $checkemail;

        $ad->subject = $titleAdvert;

        $ad->type = $typeAdvert;

        $ad->category_id = $advert_id;

        $ad->text = $text;


        if ($ad->save()) {


            $advert = new Estate();

            $advert->area = $area;

            $advert->room_number = $numberRoom;

            $advert->deposit = $textFee;

            $advert->rent = $textFee1;

            $advert->typeAdvert = $Advertiser;

            $advert->advert_id = $ad->id;


//            ($advert->save());
//
//            echo $image = implode(',', $request->images);
//            $temp = new Image();
//            $temp->image = $image;
//            $temp->advet_id = $ad->id;
//
//            if ($temp->save()) {
//                return $advert;
//            }
            return  $request->all();


        }
    }

    public function addimage(Request $request)
    {


        $imageName = time() . "." . $request->file->getClientOriginalName();
        $request->file->move(public_path('images'), $imageName);

        return response()->json($imageName);
    }
}
