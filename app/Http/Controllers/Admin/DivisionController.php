<?php

namespace App\Http\Controllers\Admin;

use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DivisionController extends Controller
{
    //
    public function index(){
        $divisions = Division::orderBy("name","ASC")->get();
        return view("admin.locations.divisions.index", compact('divisions'));
    }

    public function create(){
        return view("admin.locations.divisions.create");
    }

    public function store(Request $request){
        Division::create([
            "name" => $request->name
        ]);
        return redirect()->route("admin.divisions.index");
    }

    public function edit(Division $division){
        return view("admin.locations.divisions.edit",compact("division"));
    }

    public function update(Request $request, Division $division){
        $division->name = $request->name;
        $division->update();
        return redirect()->route("admin.divisions.index");
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Division::whereIn('id', $request->ids)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
