<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function checkUserExits(Request $request){
        $client = Client::where("device_id", $request->device_id)->where("device_id","<>",null)->first();
        if($client){
            return response()->json(["user_exists" => true],200);
        }
        return response()->json(["user_exists" => false],200);
    }

    public function storeInfo(Request $request){
        $client = new Client;
        $client->device_id = $request->device_id;
        $client->ip = request()->ip();
        $client->location = json_encode($request->location);
        $client->save();
        return response()->json([],200);
    }
}
