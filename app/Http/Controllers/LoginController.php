<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        if(!Auth::user()){
            return view('auth.login');
        }else{
            return redirect()->route('notes');
        }
    }

    public function store(Request $request)
    {
     
        $this->validate($request,[
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if (!auth()->attempt($request->only('email','password'),$request->remember)) {
           return back()->with('mensaje','Credenciales Incorrectas');
        }
        return redirect()->route('notes');
    }
}
