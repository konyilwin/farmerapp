<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestConroller extends Controller
{
    //
    public function index(){
        return view("test.index");
    }
}
