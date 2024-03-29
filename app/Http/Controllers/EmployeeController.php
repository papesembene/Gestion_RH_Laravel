<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('employees.create'
            , [
                'roles' => Role::pluck('name')->all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   /* public function store(Request $request)
    {

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique',
            'datenaiss' => 'required|date',
            'lieunaiss' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'situation_matrimoniale' => 'required|string|max:255',
            'nbrEnfants' => 'required|integer',
            'nationalite' => 'required|string|max:255',
            'dateembauche' => 'required|date',
            'type' => 'required|string|in:Stagiaire,Sous Contrat',
            'poste_id' => 'required|exists:postes,id',
            'dept_id' => 'required|exists:departements,id',
            'roles' => 'required|array',
        ]);

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $validatedData['prenom'] . ' ' . $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => Hash::make('password'), // Temporaire, vous pouvez générer un mot de passe aléatoire ici
        ]);

        // Affecter le rôle à l'utilisateur
        $user->assignRole($validatedData['roles']);

        // Créer un nouvel employé associé à l'utilisateur
        Employee::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'sexe' => $validatedData['sexe'],
            'adresse' => $validatedData['adresse'],
            'telephone' => $validatedData['telephone'],
            'email' => $validatedData['email'],
            'datenaiss' => $validatedData['datenaiss'],
            'lieunaiss' => $validatedData['lieunaiss'],
            'CIN' => $validatedData['CIN'],
            'situation_matrimoniale' => $validatedData['situation_matrimoniale'],
            'nbrEnfants' => $validatedData['nbrEnfants'],
            'nationalite' => $validatedData['nationalite'],
            'dateembauche' => $validatedData['dateembauche'],
            'type' => $validatedData['type'],
            'poste_id' => $validatedData['poste_id'],
            'dept_id' => $validatedData['dept_id'],
            'user_id' => $user->id,
        ]);

        // Envoyer un e-mail à l'utilisateur pour lui permettre de changer son mot de passe

        // Rediriger avec un message de succès
        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'datenaiss' => 'required|date',
            'lieunaiss' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'situation_matrimoniale' => 'required|string|max:255',
            'nbrEnfants' => 'required|integer',
            'nationalite' => 'required|string|max:255',
            'dateembauche' => 'required|date',
            'type' => 'required|string|in:Stagiaire,Sous Contrat',
            'poste_id' => 'required|exists:postes,id',
            'team_id' => 'string',
            'roles' => 'required|array',
        ]);

        // Créer un nouvel utilisateur
        $user = new User([
            'name' => $validatedData['prenom'] . ' ' . $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => Hash::make('password'), // Temporaire, vous pouvez générer un mot de passe aléatoire ici
        ]);
        $user->save();

        // Affecter le rôle à l'utilisateur
        $user->assignRole($validatedData['roles']);

        // Créer un nouvel employé associé à l'utilisateur
        $employee = new Employee([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'sexe' => $validatedData['sexe'],
            'adresse' => $validatedData['adresse'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'datenaiss' => $validatedData['datenaiss'],
            'lieunaiss' => $validatedData['lieunaiss'],
            'CIN' => $validatedData['CIN'],
            'situation_matrimoniale' => $validatedData['situation_matrimoniale'],
            'nbrEnfants' => $validatedData['nbrEnfants'],
            'nationalite' => $validatedData['nationalite'],
            'dateembauche' => $validatedData['dateembauche'],
            'type' => $validatedData['type'],
            'poste_id' => $validatedData['poste_id'],
            'team_id' => $validatedData['team_id'],
            'user_id' => $user->id,
        ]);
        $employee->save();

        // Rediriger avec un message de succès
        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
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
        $roles = Role::pluck('name')->all();
        return view('employees.edit', compact('employee', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($employee->user_id),
            ],
            'datenaiss' => 'required|date',
            'lieunaiss' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'situation_matrimoniale' => 'required|string|max:255',
            'nbrEnfants' => 'required|integer',
            'nationalite' => 'required|string|max:255',
            'dateembauche' => 'required|date',
            'type' => 'required|string|in:Stagiaire,Sous Contrat',
            'poste_id' => ['required', Rule::exists(Poste::class, 'id')],
            'dept_id' => ['required', Rule::exists(Departement::class, 'id')],
            'roles' => 'required|array',
        ]);

        // Mise à jour de l'utilisateur associé
        $employee->user->update([
            'name' => $validatedData['prenom'] . ' ' . $validatedData['nom'],
            'email' => $validatedData['email'],
        ]);

        // Mise à jour des autres attributs de l'employé
        $employee->update($validatedData);

        // Mise à jour des rôles
        $employee->user->syncRoles($validatedData['roles']);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->user->delete(); // Supprimer d'abord l'utilisateur associé
        $employee->delete(); // Puis supprimer l'employé
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

}
