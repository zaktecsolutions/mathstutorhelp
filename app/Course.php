<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //

    public function user()
    {
        // course hasOne User
        return $this->hasOne('App\User');

    }
}
