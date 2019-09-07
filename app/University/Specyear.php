<?php

namespace App\University;

use Illuminate\Database\Eloquent\Model;

class Specyear extends Model
{
    public function specialization()
    {
        return $this->belongsTo('App\University\Unspecialization');
    }
}
