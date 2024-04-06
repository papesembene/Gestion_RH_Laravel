<?php

namespace App\Http\Controllers;

use App\Models\Abscence;
use App\Models\Conges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbscenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vérifier si l'utilisateur est un employé ou un administrateur
        if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Gestionnaire') ) {
            // Afficher toutes les demandes de congé pour l'administrateur
            $abs = Abscence::all();
            // return view('conges.index', ['conges'=>$conges] );
        } else {
            // Afficher uniquement les demandes de congé de l'utilisateur connecté
            $abs = Abscence::where('employee_id', Auth::user()->employee_id)->get();
        }


        return view('abscences.index',compact('abs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abscences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datedebut' => 'required|date',
            'datefin' => 'required|date',
            'motif' => 'nullable|string',
            'status' => 'required|string',
            'employee_id' => 'required|exists:employees,id',
        ]);
        // Création de la demande de congé
        $abs = new Abscence();
        // Si un utilisateur est authentifié et associé à un employé, assigner l'ID de cet employé à la demande de congé
        if (Auth::check()) {
            $abs->employee_id = Auth::user()->employee_id;
        }
        $abs->employe_id = $request->input('employee_id');
        $abs->datedebut = $request->datedebut;
        $abs->datefin = $request->datefin;
        $abs->status= 'Waiting';
        $abs->motif= $request->motif;
        $abs->save();
        // Redirection avec un message de succès
        return redirect()->route('abscences.index')->with('store', 'La demande  a été créée avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Abscence $abs)
    {
        // Vérifier si l'utilisateur connecté est autorisé à afficher cette demande de congé
        if (Auth::id() === $abs->employee_id) {
            return view('conges.show', compact('abs'));
        }

        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('abscences.index')->with('error', 'Vous n\'êtes pas autorisé à afficher cette demande de congé.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(Abscence $abs)
    {
        // Vérifier si l'utilisateur connecté est autorisé à supprimer cette demande de congé
        if (Auth::id() === $abs->employee_id) {
            // Supprimer la demande de congé
            $abs->delete();
            // Rediriger avec un message de succès
            return redirect()->route('abscences.index')->with('delete', 'Demande  supprimée avec succès.');
        }
        // Rediriger avec un message d'erreur si l'utilisateur n'est pas autorisé
        return redirect()->route('abscences.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette demande de congé.');

    }
    public function accept(string $id)
    {
        //
        $conge = Abscence::find($id);
        $conge->status = "Accepted";
        $conge->save();
        return redirect()->route('abscences.index')
            ->with('success', 'Abscence accepted successfully');
    }
    public function refuse(string $id)
    {
        //
        $conge = Abscence::find($id);
        $conge->status = "Rejected";
        $conge->save();
        return redirect()->route('abscences.index')
            ->with('success', 'Abscence refused successfully');
    }
}
