<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Client;
use App\Division;
use App\City;
use App\Township;

class ClientController extends Controller
{
    //

    public function getLoactionData(Request $request){
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

    public function storeInfo(Request $request){
        $data = $request->all();
        $data["device_id"] = $request->id;
        $data["ip"] = request()->ip();
        $data["location"] = json_encode($request->location);
        $client = Client::where("device_id",$request->id)->first();
        if($client){
            $client->update($data);
        }else{
            Client::create($data);
        }
        return response()->json(["data" => []]); 
    }
}
