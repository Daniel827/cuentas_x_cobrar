<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CrearCajero extends Notification{
    use Queueable;

    public $clave=null;
    public $email=null;

    public function __construct($email,$clave){
      $this->email=$email;
      $this->clave=$clave;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable){
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable){
        return (new MailMessage)
            ->subject('Nuevo Usuario - Cuentas por Cobrar')
            ->greeting('Hola')
            ->line('Bienvenido al sistema "Cuentas por Cobrar"')
            ->line('Tú e-mail para ingresar al sistema es '.$this->email.", y tu clave es ".$this->clave)
            ->line('Ingresa al sitio '. config('app.url'))
            ->salutation('Saludos, '. config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
