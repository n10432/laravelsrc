<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AIdata;

class AIdataController extends Controller
{

    public function index(Request $request)
    {
        //$items = Person::all();
        //$user = Auth::user();
        $filetypes = AIdata::$filetypes;
        return view('aidata.index', compact('filetypes'));
    }

    
}
