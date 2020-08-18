<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    public function student()
    {
        //Conversation belongs to User- linking 'student_id' field of 'conversation' table to `id` column of Users table
        return $this->belongsTo('App\User', 'student_id', 'id');
    }

    public function tutor()
    {
        //Conversation belongs to User - linking 'tutor_id' field of 'conversation' table to `id` column of Users table
        return $this->belongsTo('App\User', 'tutor_id', 'id');
    }

    public function topic()
    {
        //Conversation belongs to Topic - linking 'topic_id' field of 'conversation' table to `id` column of topic table
        return $this->belongsTo('App\Topic', 'topic_id', 'id');
    }
}