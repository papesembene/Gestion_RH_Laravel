<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'datenaiss' => 'required|date',
            'lieunaiss' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'situation_matrimoniale' => 'required|string|max:255',
            'nbrEnfants' => 'required|numeric',
            'nationalite' => 'required|string|max:255',
            'dateembauche' => 'required|date',
            'type' => 'required|string|max:255',
            'poste_id' => 'required|exists:postes,id',
        ]);
        // Traitement de l'upload de la photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = time() . '_' . $photo->getClientOriginalExtension(); // Utiliser getClientOriginalExtension() pour obtenir l'extension originale
            $filePath = $photo->storeAs('photos', $fileName, 'public');
        } else {
            $filePath = null;
        }
        // Créer un nouvel employé à partir des données envoyées par le formulaire
        $employee = Employee::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'photo' => $filePath, // Chemin de la photo dans le système de fichiers
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'datenaiss' => $request->datenaiss,
            'lieunaiss' => $request->lieunaiss,
            'CIN' => $request->CIN,
            'situation_matrimoniale' => $request->situation_matrimoniale,
            'nbrEnfants' => $request->nbrEnfants,
            'nationalite' => $request->nationalite,
            'dateembauche' => $request->dateembauche,
            'type' => $request->type,
            'poste_id' => $request->poste_id,
            'team_id' => $request->team_id,
        ]);

        // Rediriger l'utilisateur vers la page d'index des employés avec un message de succès
        return redirect()->route('employees.index')->with('store', 'Employee created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee', ));
    }

    public function update(Request $request, $id)
    {
        // Valider les données envoyées par le formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'datenaiss' => 'required|date',
            'lieunaiss' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'situation_matrimoniale' => 'required|string|max:255',
            'nbrEnfants' => 'required|numeric',
            'nationalite' => 'required|string|max:255',
            'dateembauche' => 'required|date',
            'type' => 'required|string|max:255',
            'poste_id' => 'required|exists:postes,id',
        ]);
        $employee = Employee::findOrFail($id);

        $employee->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'datenaiss' => $request->datenaiss,
            'lieunaiss' => $request->lieunaiss,
            'CIN' => $request->CIN,
            'situation_matrimoniale' => $request->situation_matrimoniale,
            'nbrEnfants' => $request->nbrEnfants,
            'nationalite' => $request->nationalite,
            'dateembauche' => $request->dateembauche,
            'type' => $request->type,
            'poste_id' => $request->poste_id,
            'team_id' => $request->team_id,
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = time() . '_' . $photo->getClientOriginalName();
            $filePath = $photo->storeAs('photos', $fileName, 'public');
            $employee->update(['photo' => $filePath]);
        }


        return redirect()->route('employees.index')->with('update', 'Employee updated successfully');
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete(); // Puis supprimer l'employé
        return redirect()->route('employees.index')->with('delete', 'Employee deleted successfully');
    }



}
