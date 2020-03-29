<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Session;
use  Auth;


class HomeControllers extends Controller
{
    //

    public function advert()
    {


        $category = Category::orderBy('id', 'asc')->get();

        return view('advert', ['category' => $category]);
    }

    public function AdvertParent(Request $request)
    {

        $id = $request->id;
        $category = Category::find($id);
        return response()->json($category);

    }

    public function Sendsubmenu(Request $request)
    {
        $id = $request->id;

        $category = Category::where('parent_id', $id)->get();
        return response()->json($category);


    }

    public function subcats(Request $request)
    {
        $id = $request->id;
        $category = Category::where('parent_id', $id)->get();
        return response()->json($category);
    }

    public function catmenus(Request $request)
    {
        $id = $request->id;
        $cat = Category::find($id);
        return response()->json($cat);

    }

    public function send_advert2(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        return response()->json($category);

    }

//    firstOrCreat function search if find return it if does not create one
    public function addmobile(Request $request)
    {
        $mobile = $request->mobile;
        $code = rand(100, 9999);
        $user = User::where('mobile', $mobile)->first();
        if ($user) {
            $user = User::where('mobile', $mobile)->update(['code' => $code]);
        } else {
            $user = User::create(['mobile' => $mobile, 'code' => $code]);
        }

        if ($user) {
            try {
                $api = new \Kavenegar\KavenegarApi("5671714B5377432B5849577563654861325077422B5A6E51762B4F306A6B41474E6949696C4A6E7A426F6F3D");
                $sender = "10004346";
                $message = "ارسلان بهترین برنامه نویس کد تایید :  " . $user->code;
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
            return $mobile;

        } else {
            return "no";


        }

    }

    public function verifyShowCode(Request $request)
    {
        $code = $request->code;
        $x = User::where('code', $code)->where('mobile', $request->mobile)->first();

        if ($x) {
            Session::put('login', $x);
            \Illuminate\Support\Facades\Auth::login($x);
            return 'yes';
        } else {
            return "no";
        }
    }

    public function logout()
    {
        echo "first" . Session('login');

        Session::forget('login');
        echo "last" . Session('login');
    }
}

