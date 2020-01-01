<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Division;
use App\Http\Controllers\Controller;
use App\Township;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TownshipController extends Controller
{
    //
    public function index(){
        $townships = Township::orderBy("name","ASC")->get();
        return view("admin.locations.townships.index", compact('townships'));
    }

    public function create(){
        $divisions = Division::orderBy("name","DESC")->pluck("name","id");
        $cities = City::orderBy("name","DESC")->pluck("name","id");
        return view("admin.locations.townships.create", compact('divisions','cities'));
    }

    public function store(Request $request){
        Township::create([
            "name" => $request->name,
            "division_id" => $request->division,
            "city_id" => $request->city
        ]);
        return redirect()->route("admin.townships.index");
    }

    public function edit(Township $township){
        $divisions = Division::orderBy("name","DESC")->pluck("name","id");
        $cities = City::orderBy("name","DESC")->pluck("name","id");
        return view("admin.locations.townships.edit",compact("township",'divisions','cities'));
    }

    public function update(Request $request, Township $township){
        $township->update([
            "name" => $request->name,
            "division_id" => $request->division,
            "city_id" => $request->city
        ]);
        return redirect()->route("admin.townships.index");
    }

    public function destroy(Township $township)
    {
        $township->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Township::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
