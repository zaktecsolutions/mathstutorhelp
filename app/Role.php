<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    public function users()
    {
        //roles belong to many users
        return $this->belongsToMany('App\User');

    }
}
