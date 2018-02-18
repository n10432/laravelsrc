<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AIdataController extends Controller
{
    public function index(Request $request)
    {
        //$items = Person::all();
        return view('aidata.index');
    }
}
