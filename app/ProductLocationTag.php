<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLocationTag extends Model
{
    //
    public $table = 'product_location_tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
