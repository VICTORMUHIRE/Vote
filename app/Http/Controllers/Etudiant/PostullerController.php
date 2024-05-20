<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etudiant\PostulerRequest;
use App\Models\User;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostullerController extends Controller
{
    public function postuler(){
        return view('etudiant.postuler');
    }

    //     -- ----- RECUPERATION DE L'ELECTION ---- --

    public function getElectionByUser(Request $request, $type, $userId)
    {
        $user = User::findOrFail($userId); // Fetch the user based on the provided ID

        switch ($type) {
            case 'pp':
                $election = Election::where('type', $type)->first(); // No additional filtering needed
                break;
            case 'prefac':
                $election = Election::where('type', $type)
                    ->where('faculte_id', $user->faculte_id)
                    ->first(); // Filter by type and faculty
                break;
            case 'cp':
                $election = Election::where('type', $type)
                    ->where('promotion_id', $user->promotion_id)
                    ->first(); // Filter by type and promotion
                break;
            default:
                return response()->json(['error' => "Type '$type' non reconnu"], 400);
        }

        if ($election) {
            return response()->json(['election' => $election]);
        } else {
            return response()->json([], 404);
        }
    }
    public function infos()
    {
        return view('etudiant.infos');
    }

    public function storeInfos(PostulerRequest $request){
         // Handle profile picture upload
    if ($request->hasFile('photo')) {
        $filename = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('profile_pictures', $filename);
        $profilePictureUrl = Storage::url($path);
    } else {
        $profilePictureUrl = null;
    }

    // Update user's profile information
    $id = Auth::user()->id; // Get the authenticated user
    // Prepare the data to be updated
    $data = [
        'description' => $request->description,
        'photo' => $profilePictureUrl,
        'election_id' => $request->election_id,
        'role' => "candidat",
    ];

    // Attempt to update the user's data
    if (User::find($id)->update($data)) {
        // Return success response
        return response()->json([ 'message' => 'Application submitted successfully!',
                                        'redirect' => route('candidat.postuler.success')], 201);
    } else {
        // Return error response
        return response()->json(['error' => 'Failed to submit application'], 500);
    }
    }

    public function success()
    {
        $faculte_id = Auth::user()->faculte_id;
        $superviseur = User::where('role', 'superviseur')
                            ->where('faculte_id', $faculte_id)
                            ->first(); // Utilisez get() pour exécuter la requête et obtenir les résultats

        return view('etudiant.candidatureEnvoye', [
            'superviseur' => $superviseur,
        ]);
    }
}
