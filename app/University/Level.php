<?php

namespace App\University;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function subjects()
    {
        return $this->belongsToMany('App\University\Subject');
    }
}
