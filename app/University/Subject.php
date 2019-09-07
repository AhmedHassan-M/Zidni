<?php

namespace App\University;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function level()
    {
        return $this->hasMany('App\University\Level');
    }
}
