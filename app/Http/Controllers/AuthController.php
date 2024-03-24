<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
     {  
    //  User::create([
    //         'name'=>'john',
    //         'email'=>'jonh@doe.fr',
    //         'password'=>Hash::make('0000')
    //   ]);
        
        return view('auth.login');
    }
    public function doLogin(LoginRequest $request)
    {
        $creadentials = $request->validated();
        if(Auth::attempt($creadentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboad'));
        }
        return back()->withErrors([
            'email'=> 'identifiant incorrectes'
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'vous etes maintenant deconnecté'); 
    }

}
