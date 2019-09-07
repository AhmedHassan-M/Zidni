<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public function lesson(){
        return $this->hasMany('App\Lesson');
    }
}
