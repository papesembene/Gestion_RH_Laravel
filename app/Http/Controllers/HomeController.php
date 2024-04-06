<?php

namespace App\Http\Controllers;

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

        return view('home', compact('totalAgents', 'totalUsers', 'userFunctions', 'cdiAgents', 'cddAgents'));
    }

}
