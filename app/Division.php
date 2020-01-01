<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    //
    use SoftDeletes;
    protected $guarded = ["id"];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function townships(){
        return $this->hasMany(Township::class);
    }
}
