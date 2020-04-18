<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digitutor extends Model
{
    //
   /*  protected $fillable = [
        'name', 'email', 'password', 'course_id'
    ]; */
    protected $guarded = [];

    public function user()
    {
        //digitutor belongs to user
        return $this->belongsTo('App\User');

    }

    public function quizresult()
    {
        //digitutor has many quizresult
        return $this->hasMany('App\Quizresult');

    }
}
