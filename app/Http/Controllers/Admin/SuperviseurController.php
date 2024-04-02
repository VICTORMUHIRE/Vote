<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacultyFormRequest;
use App\Http\Requests\Admin\superviseurFormRequest;
use App\Models\Faculte;
use App\Models\Superviseur;

class SuperviseurController extends Controller
{

    public function index()
    {
        return view('admin.superviseur.index', [
            'superviseurs' => Superviseur::with("faculte")->orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.superviseur.form',[
            "superviseur" => new Superviseur(),
            'superviseurs' => Superviseur::with("faculte")->orderBy('created_at','desc')->paginate(25),
            "facultes" => Faculte::select('id','alias')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(superviseurFormRequest $request)
    {
        $superviseur = superviseur::create($request->validated());
        return to_route('admin.superviseur.index')->with(['success'=>'superviseur crée avec succce']);
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(superviseur $superviseur)
    {
        return view('admin.superviseur.form',[
            'superviseur'=> $superviseur,
            'superviseurs' => superviseur::with("faculte")->orderBy('created_at','desc')->paginate(25),
            "facultes" => Faculte::select('id','alias')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyFormRequest $request, superviseur $superviseur)
    {
        $superviseur->update($request -> validated());
        return to_route('admin.superviseur.index')->with(['success'=>'superviseur modifie avec succee']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(superviseur $superviseur)
    {
        $superviseur->delete();
        return to_route('admin.superviseur.index')->with(['success'=>'superviseur suprime avec succee']);
    }
}
