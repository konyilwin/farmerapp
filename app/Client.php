<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'platform',
        'ip',
        'device_id',
        'location',
    ];

    public function getSearchLogs(){
        return SearchLog::join("divisions","divisions.id","search_logs.division_id")
            ->join("cities","cities.id","search_logs.city_id")
            ->join("townships","townships.id","search_logs.township_id")
            ->select("search_logs.*","divisions.name as d_name","cities.name as c_name","townships.name as t_name")
            ->where("client_id", $this->id)
            ->orderBy("updated_at","DESC")
            ->get();
    }
}
