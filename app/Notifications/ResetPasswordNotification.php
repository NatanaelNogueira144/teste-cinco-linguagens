<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public function __construct(
        readonly string $token, 
        readonly string $email, 
        readonly string $name
    )
    {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = route('resetPassword.index', ['token' => $this->token]);
        $minutes = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');

        return (new MailMessage)
            ->subject('Redefinir Senha')
            ->greeting("Olá, {$this->name}!")
            ->line('Esqueceu a senha? Sem problemas, vamos resolver isso!')
            ->action('Redefinir Senha', $url)
            ->line("O link acima expira em {$minutes} minutos.")
            ->line('Caso você não tenha requisitado a alteração de senha, então nenhuma ação é necessária.')
            ->salutation('Até breve!');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
