<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Ajoutez cette propriété pour passer les données de l'utilisateur à la vue

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user; // Initialisez la propriété $user avec les données de l'utilisateur
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bienvenue sur notre application !')
            ->view('emails.new_user_welcome'); // Spécifiez le nom de la vue pour le contenu de l'e-mail
    }
}



