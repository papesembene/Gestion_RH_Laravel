<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;
use Carbon\Carbon;

class CheckContractExpirationController extends Controller
{
    public function checkExpiringContracts()
    {
        // Récupérer les contrats expirant bientôt
        $expiringContracts = Contrat::whereDate('datefin', '>=', Carbon::today()) // Utilise whereDate pour comparer uniquement la partie date
        ->whereDate('datefin', '<=', Carbon::today()->addDays(7))
            ->get();

        return $expiringContracts;
    }

}
