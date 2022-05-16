<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    //
    public function index()
    {
        return view('user.auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        if (Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ], $request->get('remember'))) {
            return redirect()->intended(route('user.home'));
        }
        return back()->withInput($request->only('email', 'remember'));
   
    }

    
    public function signOut(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('user.login');
       
    }
}
