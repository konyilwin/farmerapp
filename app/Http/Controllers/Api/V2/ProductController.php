<?php

namespace App\Http\Controllers\Api\V2;

use App\City;
use App\Division;
use App\Http\Controllers\Controller;
use App\SearchLog;
use App\Township;
use App\Client;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function getProducts(Request $request){
        $params = [
            "name" => $request->get("name",""),
            "division" => $request->get("division",""),
            "city" => $request->get("city",""),
            "township" => $request->get("township",""),
        ];
        $products = Product::getProducts($params);

        $client = Client::where("device_id", $request->device_id)->first();

        if($client){
            if($request->is_search){
                $client = Client::where("device_id", $request->device_id)->first();
                $log_data = [
                    "keyword" => $request->name,
                    "client_id" => $client->id,
                    "division_id" => $request->division,
                    "city_id" => $request->city,
                    "township_id" => $request->township
                ];
                SearchLog::firstOrCreate($log_data);
            }
        }

        $logs = $client ? $client->getSearchLogs() : [];

        return response()->json(["data" => [
            "products" => $products,
            "logs" => $logs
        ]]);
    }

    public function getProductDetail(Request $request){
        $product = Product::find($request->id)->load(['categories', 'tags']);
        return response()->json(["data" => $product]);
    }

    public function getProductsFromSearchLog(Request $request){
        $client = Client::where("device_id", $request->device_id)->first();
        $log = SearchLog::where("id", $request->id)->first();
        $products = [];
        if($log){
            $params = [
                "name" => $log->keyword,
                "division" => $log->division_id,
                "city" => $log->city_id,
                "township" => $log->township_id,
            ];
            $products = Product::getProducts($params);
        }
        $logs = $client ? $client->getSearchLogs() : [];
        return response()->json(["data" => [
            "products" => $products,
            "logs" => $logs
        ]]);
    }
}
