<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    //
    public function products()
    {
        return $this->morphMany('App\Product', 'commentable');
    }
}
