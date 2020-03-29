<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*    we use Estate class beacause advert and estate has one to one relation   */
use App\Estate;
use App\Car;
use App\User;
class Advert extends Model
{
    //
    protected $table="adverts";
    public $timestamps=false;

    /**
     * this function is for relation that each advert has one Estate the solo class is advert
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
public function Estate(){
    return $this->hasOne(Estate::class);
}

    /**
     * one to one relation between Advert and Car the solo class is advert
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
public function Car(){
    return $this->hasOne(Car::class);
}

    /**
     * each user has many adverts this method is for 1 to n relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
public function user(){

    return $this->belongsTo(User::class);
}

    /**
     * relation 1 to n between advert and images each user has many images
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
public function Images(){
    return $this->hasMany(Image::class);
}

    /**
     * n- to n each adverts has many chats we right belongs too many in both sides
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
public function Chats(){
    return $this->belongsToMany(Chat::class);
}





}
