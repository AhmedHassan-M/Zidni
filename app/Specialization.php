<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function enroll()
    {
        return $this->hasMany('App\Enrollspecialization');
    }

    public function application()
    {
        return $this->hasMany('App\University\Unspecialization');
    }
}
