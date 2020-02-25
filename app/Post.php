<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table="posts";
    public $timestamps=false;

    /**
     * 1 to n relation with comments  main class is post
     */
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
