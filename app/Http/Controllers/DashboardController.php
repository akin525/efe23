<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\data;
use App\Models\deposit;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function log(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/account');
        } else {
            // Invalid credentials
            return back()->withErrors(['email' => 'Invalid credentials']);
        }


    }
public function dash(Request $request)
{
    $user=User::where('username', Auth::user()->username)->first();
    $wallet=wallet::where('username', Auth::user()->username)->first();
    $tdepo=deposit::where('username', Auth::user()->username)->sum('amount');
    $tbill=bill::where('username', Auth::user()->username)->sum('amount');

    $time = date("H");
    $timezone = date("e");
    if ($time < "12") {
        $greet="Good morning ☀️";
    } else
        if ($time >= "12" && $time < "17") {
            $greet="Good afternoon 🌞";
        } else
            if ($time >= "17" && $time < "19") {
                $greet="Good evening 🌙";
            } else
                if ($time >= "19") {
                    $greet="Good night 🌚";
                }
    return view('dashboard', compact('user', 'wallet', 'tdepo', 'tbill', 'greet'));
}
public function airtimeindex()
{

    return view('bills.airtime');

}
function picknetwork()
{
    return view('bills.data');

}
function netwplanrequest(Request $request, $selectedValue)
{

    $options=data::where('network', $selectedValue)->get();
    return response()->json($options);
}
    public function invoice(Request  $request)
    {
        if(Auth::check()){
            $user = User::find($request->user()->id);
            $bill = bill::where('username', $user->username)->get();

            return view('invoice', compact('user', 'bill'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

}
