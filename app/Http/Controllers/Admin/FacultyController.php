<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacultyFormRequest;
use App\Models\Faculte;

class FacultyController extends Controller
{

    public function index()
    {
        return view('admin.faculty.index', [
            'facultes' => Faculte::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faculty.form',[
            "faculte" => new Faculte(),
            'facultes' => Faculte::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyFormRequest $request)
    {
        $faculte = Faculte::create($request->validated());
        return to_route('admin.faculte.index')->with(['success'=>'la faculte crée avec succce']);
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculte $faculte)
    {
        return view('admin.faculty.form',[
            'faculte'=> $faculte,
            'facultes' => Faculte::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyFormRequest $request, Faculte $faculte)
    {
        $faculte->update($request -> validated());
        return to_route('admin.faculte.index')->with(['success'=>'la faculte modifie avec succee']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculte $faculte)
    {
        $faculte->delete();
        return to_route('admin.faculte.index')->with(['success'=>'la faculte suprime avec succee']);
    }
}
