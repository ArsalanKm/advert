<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Advert;
class Image extends Model
{
    //
    protected $table="images";
    public $timestamps=false;

    /**
     * each advert has many images function 1 to n relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function advert(){
        return $this->belongsToMany(Advert::class);
    }
}
