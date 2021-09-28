<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class UpdateOrder extends Notification
{
    private  $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $request)
    {
        $this->request = $request;
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
            ->greeting("Prezado ". Session::get('NOME_PESSOA').",")
            ->line("O seu pedido foi atualizado no sistema. ")
            ->line('<strong>Dados do pedido<strong>')
            ->line("<strong>Número:</strong> {$this->request->COD_PEDIDO}")
            ->line("<strong>Descrição:</strong> {$this->request->DS_PEDIDO}")
            ->line("<strong>Tags:</strong> {$this->request->DS_PEDIDO_TAG}")
            ->line('Faça o seu acesso e registre uma cotação.')
            ->salutation('Desde já agradecemos.');
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
