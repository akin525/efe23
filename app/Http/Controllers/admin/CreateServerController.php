<?php


namespace App\Http\Controllers\admin;


use App\Models\airtimecons;
use Illuminate\Http\Request;

class CreateServerController
{
 function createnewserver()
 {
     return view('admin/cserver');
 }

 function postnewserver(Request $request)
 {
     $request->validate([
         'name'=>'required',
     ]);

     $create=airtimecons::create([
         'server'=>$request->name,
         'status'=>1,
     ]);
     $mg="Server Created Successfully";
     return response()->json([
         'status' => 'success',
         'message' => $mg
     ]);
 }
}
