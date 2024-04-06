<?php
// app/Http/Controllers/StatisticsController.php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TypeContrat;
use Illuminate\Http\Request;


class StatisticsController extends Controller
{
public function showStatistics()
{
// Récupérer le nombre total d'agents
$totalAgents = Employee::count();

// Récupérer le nombre d'agents CDI
$cdiAgents = TypeContrat::where('nom', 'CDI')->count();

// Récupérer le nombre d'agents CDD
$cddAgents = TypeContrat::where('nom', 'CDD')->count();

return view('statistics', compact('totalAgents', 'cdiAgents', 'cddAgents'));
}
}
