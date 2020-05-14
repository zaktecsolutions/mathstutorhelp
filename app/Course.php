<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    

    protected $guarded = [];

    public function users()
    {
        // Course has many User
        return $this->hasMany('App\User');
    }

    public function topics()
    {
        // Course has many Topic
        return $this->hasMany('App\Topic');
    }
    public function quizzes()
    {
        // Course has many Quiz
        return $this->hasMany('App\Quiz');
    }


}