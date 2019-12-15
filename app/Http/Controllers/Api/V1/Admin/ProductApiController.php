<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Product;
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
