<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\City;
use App\Division;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Product;
use App\SearchLog;
use App\Client;
use App\Township;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['categories', 'tags'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['categories', 'tags']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('photo', false)) {
            if (!$product->photo || $request->input('photo') !== $product->photo->file_name) {
                $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($product->photo) {
            $product->photo->delete();
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function search(Request $request){
        $proudcts = Product::with("categories","tags")->where(function ($query) use(&$request){
            if($request->name){
                $query->where("name","LIKE","%$request->name%");
                $query->orWhere("description","LIKE","%$request->name%");
            }
            $division = $request->division;
            $city = $request->city;
            $township = $request->township;
            if(isset($division) && !empty($division)){
                $query->whereRaw("FIND_IN_SET($division, division_ids)");
            }
            if(isset($city) && !empty($city)){
                $query->whereRaw("FIND_IN_SET($city, city_ids)");
            }
            if(isset($township) && !empty($township)){
                $query->whereRaw("FIND_IN_SET($township, township_ids)");
            }
        })
        ->orderBy("created_at","DESC")
        ->get();
        if($request->search_in_current == false){
            $client = Client::find($request->device["id"]);
            if($client){
                $division = $request->division;
                $city = $request->city;
                $township = $request->township;
                $search_log = SearchLog::where("division_id", $division)
                    ->where("city_id",$city)
                    ->where("township_id",$township)
                    ->where("keyword", $request->name)
                    ->where("client_id", $request->device["id"])
                    ->first();
                if(empty($search_log)){
                    $data = [
                        "client_id" => $client->id,
                        "keyword" => $request->name,
                        "division_id" => $division,
                        "city_id" => $city,
                        "township_id" => $township
                    ];
                    SearchLog::create($data);
                }
            }
        }
        $logs = SearchLog::where("client_id", $request->device["id"])->orderBy("updated_at","DESC")->get();
        foreach ($logs as $log){
            $division = Division::where("id",$log->division_id)->first();
            $log->division = $division;
            $city = City::where("id",$log->city_id)->first();
            $log->city = $city;
            $township = Township::where("id",$log->township_id)->first();
            $log->township = $township;
        }
        $data= [
            "products" => $proudcts,
            "logs" => $logs
        ];

        return response()->json(["data" => $data]);
    }

    public function getProduct($id){
        $item = Product::find($id)->load(['categories', 'tags']);
        return response()->json(["data" => $item]);
    }


    public function searchGG(Request $request){
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
