<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenha extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $token, public $email,public $name)
    {

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
        $url = "http://localhost:8000/password/reset/".$this->token.'?email='.$this->email;
        $min = config('auth.passwords.'.config('auth.defaults.passwords').'.expire'); 
        return (new MailMessage)
            ->subject('Redefinição de senha')
            ->greeting('Olá, '.$this->name)
            ->line('Solicitação de redefinição de senha.')
            ->action('Resetar Senha', $url)
            ->line('Esse link expirará em '.$min.' minutos.')
            ->line('Caso não tenha solicitado, ignore esse email.')
            ->salutation('Passar bem!');
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
