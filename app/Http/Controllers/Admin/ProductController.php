<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Division;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductTag;
use App\Township;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::all()->pluck('name', 'id');

        $tags = ProductTag::all()->pluck('name', 'id');

        $divisions = Division::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $townships = Township::all()->pluck('name','id');

        return view('admin.products.create', compact('categories', 'tags', 'divisions', 'cities', 'townships'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $data["user_id"] = auth()->user()->id;
        $product = Product::create($data);

        $data = $request->all();
        $data["user_id"] = auth()->user()->id;
        $product = Product::create($data);
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));
        $product->setDivisions($request->input('divisions', []));
        $product->setCities($request->input('cities', []));
        $product->setTownships($request->input('townships', []));

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::all()->pluck('name', 'id');

        $tags = ProductTag::all()->pluck('name', 'id');

        $product->load('categories', 'tags');
        $divisions = Division::all()->pluck('name','id');
        $cities = City::all()->pluck('name','id');
        $townships = Township::all()->pluck('name','id');

        return view('admin.products.edit', compact('categories', 'tags', 'product', 'divisions', 'cities', 'townships'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();
        $data["user_id"] = auth()->user()->id;
        $product->update($data);
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));
        $product->setDivisions($request->input('divisions', []));
        $product->setCities($request->input('cities', []));
        $product->setTownships($request->input('townships', []));

        if ($request->input('photo', false)) {
            if (!$product->photo || $request->input('photo') !== $product->photo->file_name) {
                $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($product->photo) {
            $product->photo->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('categories', 'tags');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
