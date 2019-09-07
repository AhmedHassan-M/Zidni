<?php

namespace App\University;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function specialization()
    {
        return $this->belongsTo('App\University\Field');
    }

    public function activity()
    {
        return $this->hasMany('App\University\Activity');
    }

    public function document()
    {
        return $this->hasOne('App\University\Document');
    }
}
