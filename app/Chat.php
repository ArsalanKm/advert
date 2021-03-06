<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $table = "chats";
    public $timestamps = false;
    protected $fillable=['chat_text','date','chat_image','advert_id','user_id','receiver_id'];

    /**
     * chat model has n-to-n relation between user class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * chat model has n-to-n relation between advert class
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function advert()
    {
        return $this->belongsToMany(Advert::class);
    }

    /**
     * each chat has many chatimages
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chatImage()
    {
        return $this->hasMany(ChatImage::class);
    }

    public function getSelfMessageAttribute()
    {
        return $this->user_id===auth()->user()->id;
    }
}
