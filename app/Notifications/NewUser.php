<?php

namespace App\Notifications;

use App\Models\Register;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
//use Illuminate\Support\Facades\Mail;

class NewUser extends Notification implements ShouldQueue
{
    use Queueable;
    protected Register $register;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Register $register)
    {
        $this->register = $register;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Prezado(a) '.$this->register->NOME_PESSOA)
                    ->line('Obrigado por se cadastrar para utilizar o sistema de saúde segue abaixo seus dados de acesso.')
                    ->line('Login: '.$this->register->CPF_CNPJ)
                    ->line('Senha: Habibbs')
                    ->line('Para retornar ao site:')
                    ->action('Clique Aqui', url('/'))
                    ->salutation("Desde de já agradecemos.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
