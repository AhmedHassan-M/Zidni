<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function enroll()
    {
        return $this->hasMany('App\Enrollmaster');
    }
}
