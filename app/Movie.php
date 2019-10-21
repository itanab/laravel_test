<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function ratings()
    {
        return $this->hasMany('\App\Rating');
    }

    /*public function people()
    {
        return $this->belongsToMany('App\Person');
    }*/

    public function collections()
    {
        //our movie table connects with Collection table thru the intermediate table
        return $this->belongsToMany(App\Collection::class, 'collection_movies');
    }
}
