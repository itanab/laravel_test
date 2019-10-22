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

    /*Go to the model Movie and declare a many-to-many relationship called favored_by_users() between the Movie model and the User model. As the second argument of the belongsToMany method put the name of the new table: 'favorite_movies'.*/

    public function favored_by_users()
    {
        return $this->belongsToMany('App\Movie', 'favorite_movies');
    }
}
