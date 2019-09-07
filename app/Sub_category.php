<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $table = 'sub_category';

    public function category()
    {
      return $this->belongsTo('App\Category','category_id');
    }
   
}
