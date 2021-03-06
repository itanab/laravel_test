<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function collections()
    {
        return $this->hasMany('App\Collection');
    }

    /*Go to the model User and declare a many-to-many relationship called favorite_movies() between the User model and the Movie model. As the second argument of the belongsToMany method put the name of the new table: 'favorite_movies'.*/

    public function favorite_movies()
    {
        return $this->belongsToMany('App\Movie', 'favorite_movies');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
