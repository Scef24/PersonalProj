<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class AuthManager extends Controller
{
    //login func
    function login(){

        return view('login');
    }
    function registration(){

        return view('registration');
    }
    public function loginPost(Request $request)
{
    $request->validate([
        'idnum' => 'required',
        'password' => 'required',

    ]);

    $credentials = $request->only('idnum', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->role == 'librarian') {

            return redirect()->intended(route('librarianhome'))->with('success', 'Welcome Librarian');
        }

        $request->session()->regenerate();
        return redirect()->intended(route('home'))->with('success', 'Login successful');
    }

    return redirect(route('login'))->with("error", "Login details are not valid");
}
    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'idnum' => 'required|idnum|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['idnum'] = $request->idnum;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error","Registration details are not valid");
        }


        return redirect(route('login'))->with("success","Registration Success");
    }

    function logOut(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect(route('login'));
    }


}
