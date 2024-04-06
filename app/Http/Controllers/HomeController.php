<?php
namespace App\Http\Controllers;

use App\Models\Conges;
use App\Models\Abscence;
use App\Models\Employee;
use App\Models\TypeContrat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
$this->middleware('auth');
}

/**
* Show the application dashboard.
*
* @return \Illuminate\Contracts\Support\Renderable
*/
public function index()
{
// Récupérer le nombre total d'employés
$totalAgents = Employee::count();

// Récupérer le nombre total d'utilisateurs
$totalUsers = User::count();

// Récupérer les fonctions des utilisateurs
$userFunctions = User::with('roles')->get()
->flatMap(function ($user) {
return $user->roles->pluck('name');
})
->unique();

// Récupérer le nombre d'agents CDI
$cdiAgents = TypeContrat::where('nom', 'CDI')->count();

// Récupérer le nombre d'agents CDD
$cddAgents = TypeContrat::where('nom', 'CDD')->count();

// Récupérer le nombre de congés en attente
$pendingConges = Conges::where('status', 'Waiting')->count();

// Récupérer le nombre de congés rejetés
$rejectedConges = Conges::where('status', 'Rejected')->count();

// Récupérer le nombre de congés acceptés
$acceptedConges = Conges::where('status', 'Accepted')->count();

// Récupérer le nombre d'absences
$absences = Abscence::count();

return view('home', compact('totalAgents', 'totalUsers', 'userFunctions', 'cdiAgents', 'cddAgents', 'pendingConges', 'rejectedConges', 'acceptedConges', 'absences'));
}
}
