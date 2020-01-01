<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    //
    public function index(){
        $cities = City::orderBy("name","ASC")->get();
        return view("admin.locations.cities.index", compact('cities'));
    }

    public function create(){
        $divisions = Division::orderBy("name","DESC")->pluck("name","id");
        return view("admin.locations.cities.create", compact('divisions'));
    }

    public function store(Request $request){
        City::create([
            "name" => $request->name,
            "division_id" => $request->division
        ]);
        return redirect()->route("admin.cities.index");
    }

    public function edit(City $city){
        $divisions = Division::orderBy("name","DESC")->pluck("name","id");
        return view("admin.locations.cities.edit",compact("city",'divisions'));
    }

    public function update(Request $request, City $city){
        $city->update([
            "name" => $request->name,
            "division_id" => $request->division
        ]);
        return redirect()->route("admin.cities.index");
    }

    public function destroy(City $city)
    {
        $city->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        City::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
