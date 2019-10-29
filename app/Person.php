<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //if model name is not following the naming convention
    protected $table = 'persons';
    public $timestamps = false;
}
