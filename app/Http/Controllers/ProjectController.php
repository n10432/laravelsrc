<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $param = $request->route()->parameter('userid');
        $userid = User::where('userid',$param)->first()->userid;
        $projects = Project::where('userid',$userid)->get();
        $data = [
            'userid'=>$userid,
            'projects'=>$projects
        ];
        return view('projects.index', $data);
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
        $userid = $request->route()->parameter('userid');
        $projectname = $request->route()->parameter('projectname');
        
        $data = [
            'userid'=>$userid,
            'projectname'=>$projectname
        ];
        return view('projects.project', $data);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $project = new Project;
        $project->projectname = $request->projectname;
        $project->userid = $user->userid;
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
