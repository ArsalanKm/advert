<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatControllers extends Controller
{
    //
    public function index($id){
        return view('chat',['id'=>$id]);
    }

}
