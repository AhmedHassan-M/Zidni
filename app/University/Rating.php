<?php

namespace App\University;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User' , 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\University\Subject');
    }
}
