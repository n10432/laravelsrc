<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Raw;
use App\User;

class RawController extends Controller
{
    public function new(Request $request)
    {
        $userid = $request->route()->parameter('userid');
        $projectname = $request->route()->parameter('projectname');
        $data = [
            'userid'=>$userid,
            'projectname'=>$projectname
        ];
        return view('raws.new', $data);
    }

    public function register(Request $request)
    {
        $filepath = 'test';
        //$filepath = $request->route()->parameter('userid') . '/' . $request->route()->parameter('projectname');
        $path = $request->file('filename')->storeAs($filepath, $request->rawname);
        $raw = new Raw;
        $raw->rawname = $request->rawname;
        $raw->filepath = $filepath;
        $raw->userid = $request->route()->parameter('userid');
        $raw->projectname = $request->route()->parameter('projectname');
        $raw->description = $request->description;
        $raw->save();
        
        return view('raws.register_result');
    }
}
