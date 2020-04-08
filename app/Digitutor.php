<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digitutor extends Model
{
    //

    public function user()
    {
        //digitutor belongs to user
        return $this->belongsTo('App\User');

    }
}
