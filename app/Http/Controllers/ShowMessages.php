<?php

namespace App\Http\Controllers;

use App\Models\Abscence;
use App\Models\Conges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMessages extends Controller
{
    public function showAllMessages()
    {

        // Récupérer les demandes de congés de l'utilisateur connecté, y compris les statuts Accepted et Rejected
        $leaveRequests = Conges::where('employee_id', auth()->user()->employee_id)
            ->whereIn('status', ['Accepted', 'Rejected'])
            ->get();
// Récupérer les demandes d'absences de l'utilisateur connecté, y compris les statuts Accepted et Rejected
        $absenceRequests = Abscence::where('employee_id', auth()->user()->employee_id)
            ->whereIn('status', ['Accepted', 'Rejected'])
            ->get();

// Fusionner les collections de demandes de congés et d'absences
        $allRequests = $leaveRequests->merge($absenceRequests);

        //dd($leaveRequests);
        // Passer les demandes fusionnées à la vue
        // Passer les demandes fusionnées à la vue
        return $allRequests;
    }
}
