<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public function reviews()
    {
        return $this->hasMany('App\Review', 'movie_id', 'id');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Review');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function people()
    {
        return $this->belongsToMany('App\Person');
    }

    public function collections()
    {
        return $this->belongsToMany(App\Collection::class, 'collection_movies');
    }

    public function favored_by_users()
    {
        return $this->belongsToMany('App\Movie', 'favorite_movies');
    }
}
