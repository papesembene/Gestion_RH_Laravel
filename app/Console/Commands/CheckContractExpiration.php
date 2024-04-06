<?php

namespace App\Console\Commands;

use App\Models\Contrat;
use ContractExpirationNotification;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CheckContractExpiration extends Command
{
    protected $signature = 'contrats:check-expiration';
    protected $description = 'Check contract expiration and send alerts';

    public function handle()
    {
        $contracts = Contrat::where('datefin', '<=', Carbon::now()->addDays(7)->toDateString())
            ->where('status', 'Active')
            ->get();

        foreach ($contracts as $contract) {
            // Envoyer l'e-mail d'alerte
            $contract->user->notify(new ContractExpirationNotification($contract));
        }
    }
}
