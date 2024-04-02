<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacultyFormRequest;
use App\Http\Requests\Admin\PromotionFormRequest;
use App\Models\Faculte;
use App\Models\Promotion;

class PromotionController extends Controller
{

    public function index()
    {
        return view('admin.promotion.index', [
            'promotions' => Promotion::with("faculte")->orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotion.form',[
            "promotion" => new Promotion(),
            'promotions' => Promotion::with("faculte")->orderBy('created_at','desc')->paginate(25),
            "facultes" => Faculte::select('id','alias')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionFormRequest $request)
    {
        $promotion = Promotion::create($request->validated());
        return to_route('admin.promotion.index')->with(['success'=>'promotion crée avec succce']);
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.form',[
            'promotion'=> $promotion,
            'promotions' => Promotion::with("faculte")->orderBy('created_at','desc')->paginate(25),
            "facultes" => Faculte::select('id','alias')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyFormRequest $request, Promotion $promotion)
    {
        $promotion->update($request -> validated());
        return to_route('admin.promotion.index')->with(['success'=>'promotion modifie avec succee']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return to_route('admin.promotion.index')->with(['success'=>'promotion suprime avec succee']);
    }
}
