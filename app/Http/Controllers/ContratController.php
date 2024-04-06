<?php

namespace App\Http\Controllers;

use App\Models\Conges;
use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vérifier si l'utilisateur est un employé ou un administrateur
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Gestionnaire') ) {
            // Afficher toutes les demandes de congé pour l'administrateur
            $contrats = Contrat::all();
            // return view('conges.index', ['conges'=>$conges] );
        } else {
            // Afficher uniquement les demandes de congé de l'utilisateur connecté
            $contrats = Contrat::where('employee_id', Auth::user()->employee_id)->get();
        }


        return view('contrats.index',compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contrats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datedebut' => 'required|date',
            'type_id' => 'required|exists:type_contrats,id',
            'employee_id' => 'required|exists:employees,id',
            'status' => 'string',
        ]);
        // Création de la demande de congé
        $con = new Contrat();
        // Si un utilisateur est authentifié et associé à un employé, assigner l'ID de cet employé à la demande de congé
        $con->employee_id = $request->employee_id;
        $con->datedebut = $request->datedebut;
        $con->datefin = $request->datefin;
        $con->type_id = $request->type_id;
        $con->status = $request->status;
        $con->save();
        // Redirection avec un message de succès
        return redirect()->route('contrats.index')->with('store', 'Le contrat a été créée avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Contrat $con)
    {
        // Vérifier si l'utilisateur connecté est autorisé à afficher cette demande de congé
        if (Auth::id() === $con->employee_id) {
            return view('contrat.show', compact('con'));
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('contrats.index')->with('error', 'Vous n\'êtes pas autorisé à afficher ceci.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrat $con)
    {
        //Vérifier si l'utilisateur connecté est autorisé à modifier cette demande de congé
        if (Auth::id() === $con->employee_id) {
            return view('conges.edit', compact('con'));
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('contrats.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ceci.');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $con)
    {
        // Vérifier si l'utilisateur connecté est autorisé à supprimer cette demande de congé
        if (Auth::id() === $con->employee_id) {
            // Supprimer la demande de congé
            $con->delete();

            // Rediriger avec un message de succès
            return redirect()->route('contrats.index')->with('delete', 'Demande  supprimée avec succès.');
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('contrats.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette demande .');

    }
    public function accept(string $id)
    {
        //
        $con = Contrat::find($id);
        $con->status = "Accepted";
        $con->save();
        return redirect()->route('contrats.index')
            ->with('success', 'Conge accepted successfully');
    }
    public function refuse(string $id)
    {
        //
        $con = Contrat::find($id);
        $con->status = "Rejected";
        $con->save();
        return redirect()->route('contrats.index')
            ->with('success', 'Conge refused successfully');
    }
}
