<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Conges;

class MaxCongesPerPeriod implements Rule
{
protected $maxConges;
protected $employeeId;

public function __construct($maxConges, $employeeId)
{
$this->maxConges = $maxConges;
$this->employeeId = $employeeId;
}

public function passes($attribute, $value)
{
$totalConges = Conges::where('employee_id', $this->employeeId)
->whereBetween('created_at', [now()->subMonths(6), now()]) // Période de 6 mois
->count();

return $totalConges < $this->maxConges;
}

public function message()
{
return 'Vous avez atteint le nombre maximum de demandes de congé pour cette période.';
}
}
