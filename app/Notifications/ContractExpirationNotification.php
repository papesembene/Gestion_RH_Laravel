<?php
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Contrat;

class ContractExpirationNotification extends Notification
{
use Queueable;

protected $contract;

public function __construct(Contrat $contract)
{
$this->contract = $contract;
}

public function via($notifiable)
{
return ['mail'];
}

public function toMail($notifiable)
{
return (new MailMessage)
->subject('Alerte : Contrat sur le point d\'expirer')
->line('Votre contrat avec le numéro ' . $this->contract->id . ' est sur le point d\'expirer.')
->action('Renouveler le contrat', url('/contracts/' . $this->contract->id . '/renew'))
->line('Merci d\'utiliser notre application.');
}
}
