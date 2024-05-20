<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
     {
        // User::create([
        //         'name'=>'john',
        //         'email'=>'jonh@doe.fr',
        //         'password'=>Hash::make('0000'),
        //         'role'=> 'admin'
        // ]);

        return view('auth.login');
    }
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.faculte.index');
            } else if($user->role === 'etudiant') {
                $request->session()->regenerate();
                return redirect()->route('etudiant.postuler');
            }else if($user->role === 'superviseur') {
                $request->session()->regenerate();
                return redirect()->route('superviseur.valider.candidature');
            }

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

    public function create(){
        return view('auth.create');
    }
    public function store(LoginRequest $request){
    
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors('Adresse e-mail introuvable.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Send a confirmation email or perform other actions as needed

        return redirect()->route('login')->with('success', 'Mot de passe réinitialisé avec succès!');
    }

    }

