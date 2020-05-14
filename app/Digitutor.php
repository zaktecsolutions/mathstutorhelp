<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digitutor extends Model
{
  
    protected $guarded = [];

    public function user()
    {
        //Digitutor belongs to User
        return $this->belongsTo('App\User');

    }

    public function quizresults()
    {
        //Digitutor has many Quizresult
        return $this->hasMany('App\Quizresult');

    }
}