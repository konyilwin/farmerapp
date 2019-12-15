<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'products';

    protected $appends = [
        'photo',
        'divisions',
        'cities',
        'townships'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'user_id',
        // 'division_ids',
        // 'city_ids',
        // 'township_ids'
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function divisions(){
        $ids = $this->division_ids;
        $ids = $ids ? explode(",",$ids) : [];
        return Division::whereIn("id",$ids)->get();
    }

    public function getDivisionsAttribute(){
        return $this->divisions();
    }

    public function cities(){
        $ids = $this->city_ids;
        $ids = $ids ? explode(",",$ids) : [];
        return City::whereIn("id",$ids)->get();
    }

    public function getCitiesAttribute(){
        return $this->cities();
    }

    public function townships(){
        $ids = $this->township_ids;
        $ids = $ids ? explode(",",$ids) : [];
        return Township::whereIn("id",$ids)->get();
    }

    public function getTownshipsAttribute(){
        return $this->townships();
    }

    public function setDivisions($ids){
        $ids = $ids ? implode(",",$ids) : null;
        $this->division_ids = $ids;
        $this->save();
    }

    public function setCities($ids){
        $ids = $ids ? implode(",",$ids) : null;
        $this->city_ids = $ids;
        $this->save();
    }

    public function setTownships($ids){
        $ids = $ids ? implode(",",$ids) : null;
        $this->township_ids = $ids;
        $this->save();
    }
}
