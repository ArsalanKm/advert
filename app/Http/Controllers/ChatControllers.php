<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatControllers extends Controller
{
    //
    public function index($id)
    {


        return view('chat', ['id' => $id]);
    }

    public function sendmessage(Request $request){
        $chat_text=$request->message;
        $advert_id=$request->advert_id;
        $sender_id=$request->user_id;
        $message=Chat::create(
[
    'chat_text'=>$chat_text,
    'advert_id'=>$advert_id,
    'sender_id'=>$sender_id,

]
        );
        if($message){
            return redirect('/chat/'.$advert_id);
        }

    }
    public function showuser(Request $request){
        $advert = DB::table('adverts')->where('adverts.Id', $id)
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->leftjoin('chats', 'adverts.Id', '=', 'chats.advert_id')
            ->get();
        return $advert;
    }

}
