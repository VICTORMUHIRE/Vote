<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuperviseurFormRequest;
use App\Models\Faculte;
use App\Models\User;

class SuperviseurController extends Controller
{

    const ROLE = "superviseur";
    public function index()
    {
        return view('admin.superviseur.index', [
            'superviseurs' => User::with("faculte")->where('role','like','superviseur')->orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.superviseur.form',[
            "superviseur" => new User(),
            'superviseurs' => User::with("faculte")->where('role','like','superviseur')->orderBy('created_at','desc')->paginate(25),
            "facultes" => Faculte::select('id','alias')->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SuperviseurFormRequest $request)
    {

        // Générer le mot de passe
        $password = $this->generatePassword($request->input('name'));

        // Créer le superviseur avec la méthode create
        $supervisor = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'faculte_id'=> $request->input('faculte_id'),
            'password' => $password,
            'role'=>self::ROLE
        ]);

        return to_route('admin.superviseur.index')->with(['success'=>'superviseur crée avec succce']);
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $superviseur)
    {
        return view('admin.superviseur.form',[
            'superviseur'=> $superviseur,
            'superviseurs' => User::with("faculte")->where('role','like','superviseur')->orderBy('created_at','desc')->paginate(25),
            "facultes" => Faculte::select('id','alias')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuperviseurFormRequest $request, User $superviseur)
    {
        $superviseur->update($request -> validated());
        return to_route('admin.superviseur.index')->with(['success'=>'superviseur modifie avec succee']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $superviseur)
    {
        $superviseur->delete();
        return to_route('admin.superviseur.index')->with(['success'=>'superviseur supprime avec succee']);
    }

    // Méthode pour générer le mot de passe
    public function generatePassword($name) {

        $firstThreeLetters = strtoupper(substr($name, 0, 3));

        $randomNumbers = str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);

        return $firstThreeLetters . $randomNumbers;
    }
}
