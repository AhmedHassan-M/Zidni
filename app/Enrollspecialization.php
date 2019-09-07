<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollspecialization extends Model
{
    protected $table = 'enroll_specialization';

    public function Specialization()
    {
        return $this->belongsTo('App\Specialization');
    }
}
