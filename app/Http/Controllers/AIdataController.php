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

    public function upload(Request $request)
    {
        //$filename = $request->file('filedata')->getClientOriginalName();
        $file = $request->file('filedata')->store('images');
        $message = 'test';
        $name = $request->username;
        if ($request->hasFile('filedata')) {
            $message = 'そのようなファイルは存在しています。';
        }
        $data = ['msg' => $message, 'name' => $name];
        return view('aidata.test', $data);
    }
    
}
