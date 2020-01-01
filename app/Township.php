<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
    //
    use SoftDeletes;
    protected $guarded = ["id"];

    public function products()
    {
        return $this->morphMany('App\Product', 'commentable');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }
}
