<?php

namespace App\Http\Controllers;

use App\Category;
use App\Estate;
use App\Order;
use Illuminate\Http\Request;
use App\Advert;
use App\Image;
use App\Http\Requests\EditRequest;

class ManageControllers extends Controller
{

    public function index($category_id, $id)
    {

        $advert = Advert::find($id);
        $category = Category::find($category_id);
        $order = Order::where('advert_id', $id)->first();

        return view('manage',
            ['order' => $order, 'advert' => $advert, 'id' => $id, 'category' => $category,
                'category_id' => $category_id]);

    }

    public function edit($category_id, $id)
    {

        $advert = Advert::find($id);
        $category = Category::find($category_id);
        $state = Estate::where('advert_id', $id)->first();
        return view('edit',
            ['advert' => $advert, 'id' => $id, 'category' => $category,
                'category_id' => $category_id, 'state' => $state]);

    }

    public function editadvert(EditRequest $request)
    {
        if ($request->area) {


            $state = Estate::where('advert_id', $request->advert_id)->update([
                'area' => $request->area,
                'deposit' => $request->deposit,
                'rent' => $request->rent,
                'room_number' => $request->numberRoom,
                'typeAdvert' => $request->TypeAdvert,
                'advertiser' => $request->Advertiser,


            ]);
        }


        $update = Advert::where('id', $request->advert_id)->update([
            'city' => $request->city,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'text' => $request->text,
            'subject' => $request->subject,
            'noemail' => $request->checkemail,


        ]);

        if ($request->images) {
            $image = implode(',', $request->images);

            $img = Image::where('advert_id', $request->advert_id)->update([


                'image' => $image,


            ]);
        }
        $category = Advert::find($request->advert_id)->category_id;
        return redirect("/manage/$category/$request->advert_id");

    }

    public function editimage(Request $request)
    {

        $imageName = time() . "." . $request->file->getClientOriginalName();
        $request->file->move(public_path('images'), $imageName);

        return response()->json($imageName);
    }

    public function deleteadvert(Request $request)
    {
        $advert_id = $request->advert_id;
        $advert = Advert::find($advert_id)->delete();
        return redirect('/advert');

    }

}
