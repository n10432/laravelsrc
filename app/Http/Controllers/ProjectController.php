<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        //$items = Person::all();
        //$user = Auth::user();
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function form(Request $request)
    {
        $data = [
            'datatypes'=>Project::$datatypes,
            'privacies'=>Project::$privacies
        ];
        return view('projects.form', $data);
    }

    public function project(Request $request)
    {
        $data = [
            'datatypes'=>Project::$datatypes,
            'privacies'=>Project::$privacies
        ];
        return view('projects.project', $data);
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
        $data = [
            'datatypes'=>Project::$datatypes,
            'privacies'=>Project::$privacies
        ];
        return view('projects.form', $data);
    }

}
