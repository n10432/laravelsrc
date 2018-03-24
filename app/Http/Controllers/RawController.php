<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Raw;
use App\User;
use App\Format;

class RawController extends Controller
{
    //rawデータ登録フォーム表示
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

    //rawデータの一覧表示
    public function index(Request $request)
    {
        $userid = $request->route()->parameter('userid');
        $projectname = $request->route()->parameter('projectname');
        //useridとprojectnameで必要なrawデータを絞り込み
        $raws = Raw::where('userid',$userid)->where('projectname',$projectname)->get();
        $data = [
            'raws'=>$raws,
        ];
        return view('raws.index', $data);
    }
    
    //加工画面の表示
    public function format(Request $request)
    {
        $userid = $request->route()->parameter('userid');
        $projectname = $request->route()->parameter('projectname');
        $rawname = $request->route()->parameter('rawname');
        $data = [
            'userid'=>$userid,
            'projectname'=>$projectname,
            'rawname'=>$rawname
        ];
        return view('raws.format', $data);
    }

    //加工データを登録する
    public function formatregister(Request $request)
    {
        $userid = $request->route()->parameter('userid');
        $projectname = $request->route()->parameter('projectname');
        $rawname = $request->route()->parameter('rawname');
        $rawfilepath = Raw::where('userid',$userid)
        ->where('projectname',$projectname)->where('rawname',$rawname)->get()->filepath;
        $content = Storage::get($rawfilepath.'/'.$rawname);
        $formatpath = $userid.'/'.$projectname.'/'.'formats';
        $path = $content->storeAs($formatpath, $request->rawname);
        $raw = new Format;
        $raw->rawname = $request->rawname;
        $raw->filepath = $filepath;
        $raw->userid = $request->route()->parameter('userid');
        $raw->projectname = $request->route()->parameter('projectname');
        $raw->description = $request->description;
        $raw->save();
        
        return view('raws.register_result');
    }

    //データ登録フォームから送られてきたデータをモデルに登録
    public function register(Request $request)
    {
        $userid = $request->route()->parameter('userid');
        $projectname = $request->route()->parameter('projectname');
        $filepath = $userid.'/'.$projectname.'/'.'raws';
        //$filepath = $request->route()->parameter('userid') . '/' . $request->route()->parameter('projectname');
        $path = $request->file('filename')->storeAs($filepath, $request->rawname);
        $raw = new Raw;
        $raw->rawname = $request->rawname;
        $raw->filepath = $filepath;
        $raw->userid = $userid;
        $raw->projectname = $projectname;
        $raw->description = $request->description;
        $raw->save();
        
        return view('raws.register_result');
    }
}
