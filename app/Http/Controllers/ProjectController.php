<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function show(Request $request)
    {
        //$items = Person::all();
        //$user = Auth::user();
        $datatypes = Project::$datatypes;
        return view('aidata.index', compact('datatypes'));
    }

    public function form(Request $request)
    {
        $data = [
            'datatypes'=>Project::$datatypes,
            'privacies'=>Project::$privacies
        ];
        return view('projects.form', $data);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $project = new Project;
        $project->projectname = $request->projectname;
        $project->email = $user->email;
        $project->datatype = $request->datatype;
        $project->description = $request->description;
        $project->privacy = $request->privacy;
        $project->save();
        return view('projects.project');
    }

}
