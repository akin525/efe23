<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\easy;

class EasyaccessDataController
{
    function sentpick($request)
    {
        $netm=data::where('network', $request)->get();
        $neta=easy::where('network', $request)->get();
        $net9=easy::where('network', $request)->get();
        $netg=easy::where('network', $request)->get();

        return view('bills.data', compact('net9', 'neta', 'netg', 'netm'));


    }
public function loadeasydata($selectedValue)
{
    $options = easy::where('network', $selectedValue)->get();
    return response()->json($options);

}
}
