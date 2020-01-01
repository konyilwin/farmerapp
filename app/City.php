<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    //
    use SoftDeletes;
    protected $guarded = ["id"];

    public function products()
    {
        return $this->morphMany('App\Product', 'commentable');
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function townships(){
        return $this->hasMany(Township::class);
    }

}
