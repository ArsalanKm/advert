<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowControllers extends Controller
{

    public function ShowControllers($city){
        return view('show');
    }
}
