<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function student()
    {
        //Digitutor belongs to User
        return $this->belongsTo('App\User', 'student_id', 'id');
    }

    public function tutor()
    {
        //Digitutor belongs to User
        return $this->belongsTo('App\User', 'tutor_id', 'id');
    }

    public function topic()
    {
        //Digitutor belongs to User
        return $this->belongsTo('App\Topic', 'topic_id', 'id');
    }
}
