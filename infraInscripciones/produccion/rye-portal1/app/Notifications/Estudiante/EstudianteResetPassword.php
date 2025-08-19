<?php

namespace App\Notifications\Estudiante;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class EstudianteResetPassword extends Notification
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
            ->line('Solicitud de restablecimiento de contraseña.')
            ->action('Restablecer contraseña', url(config('app.url').route('estudiante.password.reset', $this->token, false)))
            ->line('Si usted no solicitó restablecer su contraseña, no se requieren futuras acciones.');
    }
}
