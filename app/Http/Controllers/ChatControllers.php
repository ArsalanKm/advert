<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatControllers extends Controller
{
    //
    public function index()
    {


        return view('chat');
    }


    public function sendmessage(Request $request)
    {
        $chat_text = $request->message;
        $advert_id = $request->advert_id;
        $sender_id = request()->user()->id;
        $message = Chat::create(
            [
                'chat_text' => $chat_text,
                'advert_id' => $advert_id,
                'user_id' => $sender_id,

            ]
        );
        if ($message) {

            return redirect('/chat');
        }

    }

    public function showuser(Request $request)
    {
        $advert = DB::table('adverts')
            ->leftjoin('images', 'adverts.Id', '=', 'images.advert_id')
            ->leftjoin('estates', 'adverts.Id', '=', 'estates.advert_id')
            ->leftjoin('cars', 'adverts.Id', '=', 'cars.advert_id')
            ->leftjoin('categories', 'adverts.category_id', '=', 'categories.id')
            ->leftjoin('chats', 'adverts.Id', '=', 'chats.advert_id')
            ->get();
        return $advert;
    }

//    when we click to an advert we can see all of its advert
    public function privateMessages(User $user)
    {
        $tempUser = \Illuminate\Support\Facades\Auth::user();

        $pvCommunication = Chat::with('user')
            ->where(['user_id' => $tempUser->id,
                'receiver_id' => $user->id])->orWhere(function ($query) use ($user) {
                $query->where(['user_id' => $user->id, 'receiver_id' => \Illuminate\Support\Facades\Auth::user()->id]);
            })->get();
        return response()->json($pvCommunication);
    }

    public function sendPrivateMessage(Request $request, User $user)
    {
        if (request()->has('file')) {
            $filename = request('file')->store('chat');
            $message = Chat::create([
                'user_id' => request()->user()->id,
                'receiver_id' => $user->id,
            ]);

        } else {
            $input = $request->all();
            $input['receiver_id'] = $user->id;
            $message = Auth::user()->messages()->create($input);
        }
        broadcast(new MessageSent($message->load('user')))->toOthers();
        return response(['status' => 'Message private sent successfully', 'message' => $message]);
    }


}
