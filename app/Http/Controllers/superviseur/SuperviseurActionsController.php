<?php

namespace App\Http\Controllers\superviseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SuperviseurActionsController extends Controller
{
    public function valider()
    {

        return view('superviseur.valider');
    }
    public function getData(Request $request)
    {
        $query = User::query();

        // Get the logged-in user's faculty ID
        $loggedInUserFacultyId = Auth::user()->faculte_id;

        // Filter users by faculty ID
        $query->where('faculte_id', $loggedInUserFacultyId);

        // Filtre par rôle
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        // Filtre par type
        if ($request->has('type') && $request->type != '') {
            $query->whereHas('election', function ($query) use ($request) {
                $query->where('type', $request->type);
            });
        }

        // Filtre par promotion
        if ($request->has('promotion') && $request->promotion != '') {
            $query->where('promotion', $request->promotion);
        }

        return DataTables::of($query)
            ->addColumn('action', function ($user) {
                $actions = '';
                if ($user->role === 'etudiant') {
                    $actions .= '<button class="btn btn-danger btn-sm delete-user" data-id="' . $user->id . '">Supprimer</button>';
                } elseif ($user->role === 'candidat') {
                    if (!$user->etat_candidature) {
                        $actions .= '<button class="btn btn-success btn-sm validate-user" data-id="' . $user->id . '">Valider</button>';
                    } else {
                        $actions .= '<span class="text-success">Déjà validé</span>';
                    }
                }
                return $actions;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Allow only users of type 'etudiant' to be deleted
        if ($user->role === 'etudiant') {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        }

        return response()->json(['error' => 'You can only delete etudiant users.'], 403);
    }

    public function validateCandidate($id)
    {
        $user = User::findOrFail($id);

        // Allow only candidates to be validated
        if ($user->role === 'candidat' && $user->etat_candidature === false) {
            $user->etat_candidature = true;
            $user->save();

            return response()->json(['success' => 'Candidate validated successfully.']);
        }

        return response()->json(['error' => 'Invalid operation.'], 403);
    }

}
