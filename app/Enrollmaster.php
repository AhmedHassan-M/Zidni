<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollmaster extends Model
{
    protected $table = 'enroll_master';

    public function Master()
    {
        return $this->belongsTo('App\Master');
    }
}
