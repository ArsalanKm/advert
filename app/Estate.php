<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/* we use Advert class because relation between this class and advert is one to one and advert is refrenced class*/
use App\Advert;

class Estate extends Model
{
    //
    protected $table="estates";
    public $timestamps=false;

//this function for one To one relation between advert and Estate
    public function advert(){
        return $this->belongsTo(Advert::class);
    }

}
