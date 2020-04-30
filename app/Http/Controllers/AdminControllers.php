<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminControllers extends Controller
{
    //
    public function index()
    {   $orders=Order::all();
        $orderCount=count($orders);
        $advertCount=count(Advert::all());
        $userCount=count(User::all());


        return view('admin.index',["orderCount"=>$orderCount,"advertCount"=>$advertCount,"userCount"=>$userCount,"orders"=>$orders]);
    }

    public function advert()
    {
        $advert = Advert::orderby('id', 'desc')->paginate(10);
        return view("admin.advert.index", ['advert' => $advert]);
    }

    public function removeadvert(Request $request)
    {
        $id = $request->advert_id;
        echo $id;
        echo $advert = Advert::where("Id",$id)->delete();
        if ($advert) {
            return redirect("admin/advert");
        }

    }

// if 2 tayid shode if 3 tayid nashode
    public function status(Request $request)
    {
        $advert = Advert::find($request->id);
        if ($advert->check == 1) {
            $ad = Advert::where('Id', $request->id)->update([
                'check' => 0
            ]);
        } else {
            $ad = Advert::where('Id', $request->id)->update([
                'check' => 1
            ]);
        }
        return $ad;
    }

    public function orders(){
        $orders=DB::table('orders')
            ->leftJoin("adverts","orders.advert_id","=","adverts.Id")
            ->get();
        return view("admin.order.index",["orders"=>$orders]);

    }


}
