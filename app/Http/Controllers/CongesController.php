<?php
namespace App\Http\Controllers;
use App\Rules\MaxCongesPerPeriod;
use Illuminate\Http\Request;
use App\Models\Conges;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CongesController extends Controller
{

    /**
     * Afficher la liste des demandes de congé.
     */
    public function index()
    {
        // Vérifier si l'utilisateur est un employé ou un administrateur
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Gestionnaire') ) {
            // Afficher toutes les demandes de congé pour l'administrateur
            $conges = Conges::all();
           // return view('conges.index', ['conges'=>$conges] );
        } else {
            // Afficher uniquement les demandes de congé de l'utilisateur connecté
             $conges = Conges::where('employee_id', Auth::user()->employee_id)->get();
        }


        return view('conges.index',compact('conges'));
    }

    /**
     * Afficher le formulaire de création de demande de congé.
     */
    public function create()
    {
        return view('conges.create');
    }

    /**
     * Enregistrer une nouvelle demande de congé dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datedebut' => 'required|date|before:datefin|after_or_equal:today',
            'datefin' => 'required|date|after:datedebut',
            'leave_reason' => 'nullable|string',
            'type_conges_id' => 'required|exists:type_conges,id',
            'employee_id' => 'required|exists:employees,id',
        ]);
        // Création de la demande de congé
        $conge = new Conges();
        // Si un utilisateur est authentifié et associé à un employé, assigner l'ID de cet employé à la demande de congé
        if (Auth::check()) {
            $conge->employee_id = Auth::user()->employee_id;
        }
        $conge->datedebut = $request->datedebut;
        $conge->datefin = $request->datefin;
        $conge->type_conges_id = $request->type_conges_id;
        $conge->save();
        // Redirection avec un message de succès
        return redirect()->route('conges.index')->with('store', 'La demande de congé a été créée avec succès.');
    }
    public function show(Conges $conge)
    {
        // Vérifier si l'utilisateur connecté est autorisé à afficher cette demande de congé
        if (Auth::id() === $conge->employee_id) {
            return view('conges.show', compact('conge'));
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('conges.index')->with('error', 'Vous n\'êtes pas autorisé à afficher cette demande de congé.');
    }
    public function edit(Conges $conge)
    {
        // Vérifier si l'utilisateur connecté est autorisé à modifier cette demande de congé
        if (Auth::id() === $conge->employee_id) {
            return view('conges.edit', compact('conge'));
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('conges.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette demande de congé.');
    }

    /**
     * Met à jour une demande de congé spécifique.
     */
    public function update(Request $request, Conges $conge)
    {
        // Vérifier si l'utilisateur connecté est autorisé à modifier cette demande de congé
        if (Auth::id() === $conge->employee_id) {
            // Validation des données de formulaire
            $request->validate([
                'datedebut' => 'required|date',
                'datefin' => 'required|date',
                'type_id' => 'required',
            ]);

            // Mettre à jour la demande de congé
            $conge->update([
                'datedebut' => $request->datedebut,
                'datefin' => $request->datefin,
                'type_id' => $request->type_id,
                'status' => 'En Attente',
            ]);

            // Rediriger avec un message de succès
            return redirect()->route('conges.index')->with('update', 'Demande de congé mise à jour avec succès.');
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('conges.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette demande de congé.');
    }

    /**
     * Supprime une demande de congé spécifique.
     */
    public function destroy(Conges $conge)
    {
        // Vérifier si l'utilisateur connecté est autorisé à supprimer cette demande de congé
        if (Auth::id() === $conge->employee_id) {
            // Supprimer la demande de congé
            $conge->delete();

            // Rediriger avec un message de succès
            return redirect()->route('conges.index')->with('delete', 'Demande de congé supprimée avec succès.');
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('conges.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette demande de congé.');
    }

    public function accept(string $id)
    {
        //
        $conge = Conges::find($id);
        $conge->status = "Accepted";
        $conge->save();
        return redirect()->route('conges.index')
            ->with('success', 'Conge accepted successfully');
    }
       public function refuse(string $id)
       {
           //
           $conge = Conges::find($id);
           $conge->status = "Rejected";
           $conge->save();
           return redirect()->route('conges.index')
               ->with('success', 'Conge refused successfully');
       }

}
