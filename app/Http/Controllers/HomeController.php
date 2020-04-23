<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $storage=Storage::get();
        return view("home",["storage"=>$storage]);
    }
    public function generaterandomcode()
    {
        $arr="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ<";
        $to_ret="";
        for ($i=0; $i <6 ; $i++) { 
            $to_ret.=$arr[rand(0,61)];
        }
        return $to_ret;
    }
    public function save(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|string",
            "date"=>"required|date",
        ]);
        Storage::Create([
            "name"=>$request->input("name"),
            "creatdate"=>$request->input("date"),
            "quantity"=>rand ( 1 , 100) ,
            "code"=>$this->generaterandomcode(),
            "goodfor"=>rand ( 1 , 30),

        ]);
    }
    public function delete(Request $request)
    {
        $this->validate($request,[
            "id"=>"required|integer"
        ]);
        Storage::where("s_id",$request->input("id"))->delete();
    }
    public function edit($id)
    {
        if (!is_numeric($id)) {
            return rediect()->route("home");
        }
        if (Storage::where("s_id",$id)->count()==0) {
            return redirect()->route("home");
            
        }
        $storage=Storage::where("s_id",$id)->first();
        return view("edit",["recs"=>$storage]);


    }
    public function update(Request $request)
    {
        $this->validate($request,[
            "name"=>"required|string",
            "date"=>"required|date",
            "id"=>"required|integer"

        ]);
        Storage::where("s_id",$request->input("id"))->update([
            "name"=>$request->input("name"),
            "creatdate"=>$request->input("date"),
        ]);
            return redirect()->route("home");


    }
}
