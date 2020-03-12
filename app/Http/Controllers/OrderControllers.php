<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\HelperFunction\bitpay;


class OrderControllers extends Controller
{

    public function order($id)
    {
        $advert = Advert::find($id);

        echo $order = Order::where('advert_id', $id)->first();

        $price = $order->price;
        Session::put('id_order', $order->id);

        if ($order->cost1 == "urgent") {
            $x = "فوری";
        }
        elseif ($order->cost == "reorder") {
            $x = "نردبان";
        }
        elseif ($order->cost == "urgent_reorder") {
            $x = " و نردبان فوری";
        }

        elseif ($order->cost3 == "renew") {
            $x = "تمدید";
        }
        elseif ($order)
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
        $order->cost1 = $request->cost1;
        $order->cost2 = $request->cost2;
        $order->cost3 = $request->cost3;

        $order->price = $request->price;
        $order->advert_id = $request->advert_id;
        $order->save();
        if ($order->save())
            return redirect("/order/" . $request->advert_id);
    }

    public function buyback(Request $request)
    {
        $url = 'http://bitpay.ir/payment-test/gateway-result-second';
        $api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';
        $trans_id = $request->trans_id;
        $id_get = $request->id_get;
        $order = Order::find(session::get('id_order'));
        $order->trans_id = $trans_id;
        $order->id_get = $id_get;

        $result = bitpay::get($url, $api, $trans_id, $id_get);
        if ($result == 1) {
            $order->status = 1;
            if ($order->update()) {
                session::forget('id_order');
                return redirect("/");

            }
        } else {
            //r
            return " not ok";
        }
    }
}
