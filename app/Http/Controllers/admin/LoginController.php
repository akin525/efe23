<?php

namespace App\Http\Controllers\admin;

use app\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController
{
public function login(Request $request)
{


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', Hash::make($request->password))->where('role', 'admin')
            ->first();

        if (!isset($user)) {
            return redirect()->back()->withInput($request->only('username', 'remember'))
                ->withErrors(['admin' => 'You have not been assign as admin.']);
        }

        Auth::login($user);

        return redirect()->intended('admin/dashboard')
            ->withSuccess('Signed in');
}
public function index()
{
    return view('admin.auth.login');

}
}
