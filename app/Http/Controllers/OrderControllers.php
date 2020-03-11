<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Order;
use Illuminate\Http\Request;
use App\HelperFunction\bitpay;
use Illuminate\Support\Facades\URL;

class OrderControllers extends Controller
{

    public function order($id)
    {
        $advert = Advert::find($id);
        $order = Order::where('advert_id', $id)->first();

        $price = $order->price;

        if ($order->cost == "urgent") {
            $x = "فوری";
        }
        $id = time();
        $url = 'http://bitpay.ir/payment-test/gateway-send';
        $api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';
        $amount = $price;
        $redirect = url('/buyback');
        $name = $x;
        $email = $advert->email;
        $description = $advert->text;
        $factorId = 1;

        $result = bitpay::send($url, $api, $amount, $redirect, $factorId, $name, $email, $description);

        if ($result > 0 && is_numeric($result)) {

            return redirect('http://bitpay.ir/payment-test/gateway-' . $result);

        } else {
            echo "problem happend";

        }


    }

    public function addorder(Request $request)
    {
        $order = new Order();
        $order->cost = $request->cost;
        $order->price = $request->price;
        $order->advert_id = $request->advert_id;
        if ($order->save())
            return redirect("/order");
    }

    public function buyback(Request $request)
    {
        $url = 'http://bitpay.ir/payment-test/gateway-result-second';
        $api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';
        $trans_id = $request->trans_id;
        $id_get = $request->id_get;
        $result = bitpay::get($url, $api, $trans_id, $id_get);
        echo $result;

        if ($result == 1) {
            return "ok bitch";
        } else {
            //r
            return " not ok";
        }
    }
}
