<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Admin\ElectionFormRequest;
use App\Models\Election;
use App\Models\Promotion;
use App\Models\Faculte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ElectionNotification;
class ElectionController extends Controller
{
    public function index(){

        return view("admin.election.index",[
            'Elections' => Election::orderBy('created_at','desc')->paginate(10),
        ]);
    }

    public function generate(Request $request)
    {
        $openingDate = $request->input('openingDate');

        // Check for existing election names
        $existingElectionNames = Election::pluck('name')->toArray();

        // Generate PP election
        $electionName = 'Election du PP';
        if (!in_array($electionName, $existingElectionNames)) {
            $election = new Election;
            $election->name = $electionName;
            $election->date_ouverture = $openingDate;
            $election->etat = false;
            $election->type = 'pp';
            $election->save();
        }

        // Generate Préfac elections for each faculty
        $faculties = Faculte::all();
        foreach ($faculties as $faculte) {
            $electionName = 'Election PREFAC ' . $faculte->alias;
            if (!in_array($electionName, $existingElectionNames)) {
                $election = new Election;
                $election->name = $electionName;
                $election->date_ouverture = $openingDate;
                $election->etat = false;
                $election->type = 'prefac';
                $election->faculte_id = $faculte->id;
                $election->save();
            }
        }

        // Generate CP elections for each promotion
        $promotions = Promotion::all();
        foreach ($promotions as $promotion) {
            $electionName = 'Election CP ' . $promotion->alias . ' de ' . $promotion->faculte->alias;
            if (!in_array($electionName, $existingElectionNames)) {
                $election = new Election;
                $election->name = $electionName;
                $election->date_ouverture = $openingDate;
                $election->type = 'cp';
                $election->etat = false;
                $election->promotion_id = $promotion->id;
                $election->faculte_id = $promotion->faculte->id;
                $election->save();
            }
        }

        // Return success response
        return response()->json('success');
    }


public function annoncerScrutin()
{
   // Sélection des étudiants
    $etudiants = User::where('role', 'etudiant')->with('faculte')->get();
    $election = Election::first();

    foreach ($etudiants as $etudiant) {
        $faculte = $etudiant->faculte; // Récupérer la faculté de l'étudiant
        Mail::to($etudiant->email)->send(new ElectionNotification($etudiant, $election, $faculte));
    }

    // Sélection des superviseurs
    $superviseurs = User::where('role', 'superviseur')->get();

    foreach ($superviseurs as $superviseur) {
        $faculte = $superviseur->faculte ; // Récupérer la faculté du superviseur
        Mail::to($superviseur->email)->send(new ElectionNotification($superviseur, $election, $faculte));
    }
    return redirect()->back()->with('success', 'Emails envoyés avec succès!');
}





    public function delete(Election $election){
        $election->delete();
        return to_route('admin.election')->with(['success'=>'életion suprime avec succee']);

    }
}


