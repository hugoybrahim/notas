<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        //Modificar el Request

        $request->request->add(['name' => Str::slug($request->name)]);

        //Validacion
        $this->validate($request,[
            'name'      => 'required|min:3|max:30', // o puedes colocar ['required','min:5']
            'email'     => 'required|unique:users|email|max:60',
            'password'  => 'required|confirmed|min:6'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)


        ]);
        
        // Autenticar

      /*   auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
 */
        //Otra forma de autenticar
        
       // auth()->attempt($request->only('email','password'));

        //Redireccionar

        return redirect()->route('login');

    }

}
