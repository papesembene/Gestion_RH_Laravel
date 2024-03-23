<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToNewUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
     public  $code;
     public $email;

    public function __construct($codeTosend,$emailTosend)
    {
        $this->code = $codeTosend;
        $this->email = $emailTosend;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('creation de compte')
            ->line('BONJOUR')
            ->line('Votre compte a ete cree avec succes sur la plateforme gestion RH
            ')
            ->line('Cliquez sur le bouton ci dessous pour valider
            votre compte')
            ->line('Saisissez le code'. $this->code .'et renseignez le dans le formulaire qui apparaitra')
            ->action('Cliquez ici',
                url('/users/edit' . '/' . $this->email))
            ->line('Merci et Bonne Reception ');

    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
