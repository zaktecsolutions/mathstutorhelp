<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [
        'ans_image',  'ans_body', 'ans_explanation'
    ];

    public function question()
    {
        //digitutor belongs to user
        return $this->belongsTo('App\Question');

    }
}
