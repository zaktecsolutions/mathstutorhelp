<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
   
    protected $guarded = [];

    public function question()
    {
        //Answer belongs to question 
        return $this->belongsTo('App\Question');

    }
}