<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function search(Request $request){
        if($request->type == 1){
            $proudcts = Product::with("categories","tags")->where("name","LIKE","%$request->name%")
                ->orWhere("description","LIKE","%$request->name%")
                ->orderBy("created_at","DESC")
                ->get();
            return response()->json(["data" => $proudcts]);
        }else if($request->type == 2 || $request->type == 3){
            if($request->type == 2){
                $division = $request->division;
                $city = $request->city;
                $township = $request->township;
            }else{
                $division = $request->device["location"]["division"];
                $city = $request->device["location"]["city"];
                $township = $request->device["location"]["township"];
            }            
            $proudcts = Product::with("categories","tags")->where(function ($q) use(&$division,&$city,&$township){
                    if(isset($division) && !empty($division)){
                        $q->whereRaw("FIND_IN_SET($division, division_ids)");
                    }                   
                    if(isset($city) && !empty($city)){
                        $q->whereRaw("FIND_IN_SET($city, city_ids)");
                    }                   
                    if(isset($township) && !empty($township)){
                        $q->whereRaw("FIND_IN_SET($township, township_ids)");
                    }                   
                })
                ->orderBy("created_at","DESC")
                ->get();
            return response()->json(["data" => $proudcts]);
        }
        return response()->json(["data" => []]);
    }
}
