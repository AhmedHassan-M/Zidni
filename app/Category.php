<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function sub_category()
    {
        return $this->hasMany('App\Sub_category');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
