<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectController extends Controller
{
    public function show(Request $request)
    {
        //$items = Person::all();
        //$user = Auth::user();
        $filetypes = AIdata::$filetypes;
        return view('aidata.index', compact('filetypes'));
    }

    public function form(Request $request)
    {
        return view('projects.form');
    }

    public function create(Request $request)
    {
        //$items = Person::all();
        //$user = Auth::user();
        $filetypes = AIdata::$filetypes;
        return view('aidata.index', compact('filetypes'));
    }

}
