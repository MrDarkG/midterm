<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
class SearchController extends Controller
{
   	public function index(Request $requset)
   	{
   		$this->validate($requset,[
            "name"=>"string|nullable",
            "creatdate"=>"date|nullable",
            "quantity"=>"numeric|nullable" ,
            "code"=>"string|nullable",
            "goodfor"=>"numeric|nullable",
   		]);
   		$search=[];
   		
   		if (!is_null($requset->input("name"))) {
   			array_push($search, ["name",$requset->input("name")]);
   		}
   		if (!is_null($requset->input("creatdate"))) {
   			array_push($search, ["creatdate",$requset->input("creatdate")]);

   		}
   		if (!is_null($requset->input("quantity"))) {
   			array_push($search, ["quantity",$requset->input("quantity")]);
   		}
   		if (!is_null($requset->input("code"))) {
   			array_push($search, ["code",$requset->input("code")]);

   		}
   		if (!is_null($requset->input("goodfor"))) {
   			array_push($search, ["goodfor",$requset->input("goodfor")]);

   		}
   		return Storage::where($search)->get();
   	}
}
