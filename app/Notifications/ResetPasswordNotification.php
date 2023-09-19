<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Mail;
class ResetPasswordNotification extends Notification
{
    use Queueable;

    //Token handler
    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
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

       $servidor =  $_SERVER['HTTP_HOST'];

         // credenciales envio de correo para un nuevo cajero
         
         // envio de correos
        //  Mail::send('emails.resetpassword', ['servidor' => $servidor,'token' => $this->token], function ($msj) use ($notifiable) {
        //     $msj->to($notifiable->email, $notifiable->name)->subject('Restablecer contraseña');
    
        //  });

    //     $data = array(
    //         'name'=>$notifiable->name,
    //         'token' =>$this->token,
    //         );
   /**
    * GUIAR PARA ENVIO.
    */

    //     Mail::send('emails.blank', $data, function($message) use ($notifiable) {

    //        $message->from('rentabyte@m.com','Rentabyte su mejor opcion');
    //        $message->to($notifiable->email, $notifiable->name)->subject
    //           ('Restablecer contraseña');
          
    //     });
     
    //    return (new MailMessage);

    // return (new MailMessage)
    // ->line(__('You are receiving this email because we received a password reset request for your account'))
    //         //TODO: REVISAR EL USO DE LA FUNCION URL
    // ->action(__('Reset Password'), url('reset',['token' => $this->token]))
    // ->line(__('If you did not request a password reset, no further action is required.'));


    return (new MailMessage)

            ->subject('Solicitud de reestablecimiento de contraseña Punto de Venta Inteligente') //agregamos el asunto
            ->greeting('Hola ' . $notifiable->name)// titulo del mensaje
            ->line('Recibes este email porque se solicitó el reestablecimiento de contraseña para tu cuenta.')
            ->line('El tiempo de recuperación de contraseña es de 60 minutos ')
            // Action : Texto del botón , url(app.url) la tomará desde el .env  , la ruta reset con el token respectivo
            ->action('Cambiar contraseña', url( $this->token))
            ->line('Sino realizaste esta petición ignora este correo.')
            ->salutation('Saludos.'); // Saludo Final

    
    }


}
