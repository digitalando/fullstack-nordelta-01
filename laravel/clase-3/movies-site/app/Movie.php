<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    function actors() {
        return $this->belongsToMany('App\Actor');
    }
}
