<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Advert;
class Car extends Model
{
    //
    protected $table="cars";
    public $timestamps=false;

//function for one to one relation between car and advert class
    public function advert(){
        return $this->belongsTo(Advert::class);
    }
}
