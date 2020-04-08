<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    

    public function users()
    {
        // course has many users 
        return $this->hasMany('App\User');
    }


    public function topics()
    {
        // courses has many topic
        return $this->hasMany('App\Topic');
    }


}
