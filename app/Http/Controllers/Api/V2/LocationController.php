<?php

namespace App\Http\Controllers\Api\V2;

use App\City;
use App\Division;
use App\Http\Controllers\Controller;
use App\Township;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function getLocations(Request $request){
        if($request->type == "division"){
            return response()->json(["data" => Division::all()]);
        }else if($request->type == "city"){
            $data = City::where("division_id",$request->id)->get();
            return response()->json(["data" => $data]);
        }else if($request->type == "township"){
            $data = Township::where("city_id",$request->id)->get();
            return response()->json(["data" => $data]);
        }
        return response()->json(["data" => []]);
    }
}
