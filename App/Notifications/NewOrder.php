<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\OrderTag;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class NewOrder extends Notification
{
    use Queueable;

    private $order;
    private  $orderTag;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order , OrderTag $orderTag)
    {
        $this->order = $order;
        $this->orderTag = $orderTag;
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
                    ->line("O seu pedido foi registrado no sistema. ")
                    ->line('<strong>Dados do pedido<strong>')
                    ->line("<strong>Número:</strong> {$this->order->COD_PEDIDO}")
                    ->line("<strong>Data:</strong> {$this->order->DT_PEDIDO}")
                    ->line("<strong>Descrição:</strong> {$this->order->DS_PEDIDO}")
                    ->line("<strong>Tags:</strong> {$this->orderTag->DS_PEDIDO_TAG}")
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
