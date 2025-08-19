<?php

namespace App\Notifications\Aspirante;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AspiranteResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param string $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param mixed $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            //->line('You are receiving this email because we received a password reset request for your account.')
            //->action('Reset Password', url(config('app.url').route('aspirante.password.reset', $this->token, false)))
            //->line('If you did not request a password reset, no further action is required.');
            ->line('Está recibiendo este correo porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.')
            ->action('Restablecer contraseña', url(config('app.url').route('aspirante.password.reset', $this->token, false)))
            ->line('Si usted no solicito restablecer su contraseña, no se requieren futuras acciones.');
    }
}
