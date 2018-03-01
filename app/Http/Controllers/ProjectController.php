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
        $userid = $request->route()->parameter('userid');
        $email = User::where('name',$userid)->first()->email;
        $projects = Project::where('email',$email)->get();
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
        $userId = $request->route()->parameter('userid');
        $projectId = $request->route()->parameter('project');
        
        $data = [
            'userId'=>$userId,
            'projectId'=>$projectId
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
