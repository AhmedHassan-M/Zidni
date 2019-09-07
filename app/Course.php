<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function instructor()
    {
        return $this->belongsTo('App\Instructor');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function weeks()
    {
        return $this->hasMany('App\Week');
    }

    public function quiz()
    {
        return $this->hasOne('App\Quiz');
    }

    public function enroll()
    {
        return $this->hasMany('App\Enroll');
    }

    public function specializations()
    {
        return $this->belongsToMany('App\Specialization');
    }

    public function masters()
    {
        return $this->belongsToMany('App\Master');
    }
}
