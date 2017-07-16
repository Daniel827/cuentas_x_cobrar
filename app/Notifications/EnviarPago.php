<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EnviarPago extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
    public function toMail($notifiable){
      $pdf = \PDF::loadView('panel.cajeros.reporte')->stream('reporte.pdf');
        return (new MailMessage)
                    ->subject('Comprobante Electrónico- Cuentas por Cobrar')
                    ->greeting('Hola')
                    ->line('Estimado cliente')
                    ->line('Reciba un cordial saludo de quienes hacemos el grupo CXC. Nos complace
                    informarle que su documento electrónico ha sido generado con el Nro: PAGO-XXXXX')
                    ->attachData($pdf, 'reporte.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->line('Adjunto encontrará su documento electrónico.')
                    ->salutation('Saludos, '. config('app.name'));
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
