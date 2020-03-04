<?php

namespace App\Http\Controllers;

use App\Car;
use App\Image;
use Illuminate\Http\Request;
use App\Estate;
use App\Advert;
use Illuminate\Support\Facades\Redirect;
use Kavenegar;
use function PHPSTORM_META\type;


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
// agahiye darkhasti ya eraeyi
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

        $ad->mobile = $mobile;
        $ad->code = rand(10000, 99999);


        if ($ad->save()) {

            try {
                $api = new \Kavenegar\KavenegarApi("5671714B5377432B5849577563654861325077422B5A6E51762B4F306A6B41474E6949696C4A6E7A426F6F3D");
                $sender = "10004346";
                $message = "you recieved this message from arsalan best programmer bro :  " . $ad->code;
                $receptor = $request->mobile;
                $result = $api->Send($sender, $receptor, $message);
                if ($result) {
                    foreach ($result as $r) {
                        echo "messageid = $r->messageid";
                        echo "message = $r->message";
                        echo "status = $r->status";
                        echo "statustext = $r->statustext";
                        echo "sender = $r->sender";
                        echo "receptor = $r->receptor";
                        echo "date = $r->date";
                        echo "cost = $r->cost";
                    }
                }
            } catch (\Kavenegar\Exceptions\ApiException $e) {
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            } catch (\Kavenegar\Exceptions\HttpException $e) {
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }


//****************************************************
            $advert = new Estate();

            $advert->area = $area;

            $advert->room_number = $numberRoom;

            $advert->deposit = $textFee;

            $advert->rent = $textFee1;

            $advert->typeAdvert = $Advertiser;

            $advert->advert_id = $ad->id;
            $advert->advertiser=$Advertiser;


            ($advert->save());

            echo $image = implode(',', $request->images);
            $temp = new Image();
            $temp->image = $image;
            $temp->advert_id = $ad->id;

            if ($temp->save()) {
                // we are sending to route
                return Redirect::route('manage', ['category_id' => $advert_id, 'id' => $ad->id]);
            }


        }
    }

    public function addimage(Request $request)
    {


        $imageName = time() . "." . $request->file->getClientOriginalName();
        $request->file->move(public_path('images'), $imageName);

        return response()->json($imageName);
    }


    public function sendsms($mobile = "09905304009")
    {
        try {
            $api = new \Kavenegar\KavenegarApi("5671714B5377432B5849577563654861325077422B5A6E51762B4F306A6B41474E6949696C4A6E7A426F6F3D");
            $sender = "10004346";
            $message = "خدمات پیام کوتاه کاوه نگار";
            $receptor = $mobile;
            $result = $api->Send($sender, $receptor, $message);
            if ($result) {
                foreach ($result as $r) {
                    echo "messageid = $r->messageid";
                    echo "message = $r->message";
                    echo "status = $r->status";
                    echo "statustext = $r->statustext";
                    echo "sender = $r->sender";
                    echo "receptor = $r->receptor";
                    echo "date = $r->date";
                    echo "cost = $r->cost";
                }
            }
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }

    public function addcars(Request $request)
    {
        $city = $request->city;
        $mobile = $request->mobile;
        $chat = $request->chat;
        $email = $request->email;
        $checkemail = $request->checkemail;
        $text = $request->text;
        $subject = $request->titleAdvert;
        $TypeAdvert = implode(',', $request->type);
        $year = $request->year;
        $runt_time = $request->run_time;
        $brand = $request->brand;
        $fee = $request->fee;
        $advert_id = $request->advert_id;


        $ad = new Advert();
        $ad->city = $city;
        $ad->email = $email;
        $ad->chat = $chat;
        $ad->noemail = $checkemail;
        $ad->subject = $subject;
        $ad->type = $TypeAdvert;
        $ad->category_id = $advert_id;
        $ad->text = $text;
        $ad->mobile = $mobile;
        $ad->code = rand(10000, 99999);


        if ($ad->save()) {
//            try {
//                $api = new \Kavenegar\KavenegarApi("5671714B5377432B5849577563654861325077422B5A6E51762B4F306A6B41474E6949696C4A6E7A426F6F3D");
//                $sender = "10004346";
//                $message = "ارسلان بهترین برنامه نویس کد تایید :  " . $ad->code;
//                $receptor = $mobile;
//                $result = $api->Send($sender, $receptor, $message);
//                if ($result) {
//                    foreach ($result as $r) {
//                        echo "messageid = $r->messageid";
//                        echo "message = $r->message";
//                        echo "status = $r->status";
//                        echo "statustext = $r->statustext";
//                        echo "sender = $r->sender";
//                        echo "receptor = $r->receptor";
//                        echo "date = $r->date";
//                        echo "cost = $r->cost";
//                    }
//                }
//            } catch (\Kavenegar\Exceptions\ApiException $e) {
//                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
//                echo $e->errorMessage();
//            } catch (\Kavenegar\Exceptions\HttpException $e) {
//                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
//                echo $e->errorMessage();
//            }


            $car = new Car();

            $car->brand = $brand;
            $car->year = $year;
            $car->sunation = $runt_time;
            $car->color = $request->color;

            $car->type = $TypeAdvert[0];
            $car->fee = $fee;
            $car->advert_id = $ad->id;

            if ($car->save()) {
                if ($request->image != null)
                    echo $image = implode(',', $request->images);
                else {
                    $image = null;
                }
                $temp = new Image();
                $temp->image = $image;
                $temp->advert_id = $ad->id;

                if ($temp->save()) {
                    return Redirect::route('manage', ['category_id' => $advert_id, 'id' => $ad->id]);
                }
            }


        }


    }

    public function addpublic(Request $request)
    {

        $city = $request->city;
        $mobile = $request->mobile;
        $chat = $request->chat;
        $email = $request->email;
        $checkemail = $request->checkemail;
        $text = $request->text;
        $subject = $request->titleAdvert;
        $TypeAdvert = implode(',', $request->type);
        $year = $request->year;
        $brand = $request->brand;
        $fee = $request->fee;
        $advert_id = $request->advert_id;


        $ad = new Advert();
        $ad->city = $city;
        $ad->email = $email;
        $ad->chat = $chat;
        $ad->noemail = $checkemail;
        $ad->subject = $subject;
        $ad->type = $TypeAdvert;
        $ad->category_id = $advert_id;
        $ad->text = $text;
        $ad->code = rand(10000, 99999);
        $ad->brand = $brand;


        if ($ad->save()) {
            try {
                $api = new \Kavenegar\KavenegarApi("5671714B5377432B5849577563654861325077422B5A6E51762B4F306A6B41474E6949696C4A6E7A426F6F3D");
                $sender = "10004346";
                $message = "ارسلان بهترین برنامه نویس کد تایید :  " . $ad->code;
                $receptor = $mobile;
                $result = $api->Send($sender, $receptor, $message);
                if ($result) {
                    foreach ($result as $r) {
                        echo "messageid = $r->messageid";
                        echo "message = $r->message";
                        echo "status = $r->status";
                        echo "statustext = $r->statustext";
                        echo "sender = $r->sender";
                        echo "receptor = $r->receptor";
                        echo "date = $r->date";
                        echo "cost = $r->cost";
                    }
                }
            } catch (\Kavenegar\Exceptions\ApiException $e) {
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            } catch (\Kavenegar\Exceptions\HttpException $e) {
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }


        }


    }

    public function verifyCode(Request $request)

    {
        $code=$request->code;
        $db_code=Advert::where('code',$code)->first();
        return $db_code;


    }
}


