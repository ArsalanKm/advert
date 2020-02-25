<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatImage extends Model
{
    protected $table="chatimages";
    public $timestamps=false;

    public function chat(){

        return $this->belongsToMany(Chat::class);
    }
}


