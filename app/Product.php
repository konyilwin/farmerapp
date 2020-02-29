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

    public static function getProducts($params){
        return self::with("categories","tags")->where(function ($query) use($params){
                if(isset($params["name"]) && !empty($params["name"])){
                    $query->orWhere("name","LIKE","%".$params['name']."%");
                    $query->orWhere("description","LIKE","%".$params['name']."%");
                }
                if(isset($params["division"]) && !empty($params["division"])){
                    $query->whereRaw("FIND_IN_SET('".$params["division"]."', division_ids)");
                }
                if(isset($params["city"]) && !empty($params["city"])){
                    $query->whereRaw("FIND_IN_SET('".$params["city"]."', city_ids)");
                }
                if(isset($params["township"]) && !empty($params["township"])){
                    $query->whereRaw("FIND_IN_SET('".$params["township"]."', township_ids)");
                }
            })
            ->orderBy("created_at","DESC")
            ->get();
    }
}
