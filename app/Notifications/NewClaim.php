<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewClaim extends Notification
{
    use Queueable;

    protected  $claim;

    public function __construct($claim)
    {
        $this->claim = $claim;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {


        return [

            "claim" => $this->claim,
            "trazitelj"=>auth()->user(),
            "user" => $notifiable

        ];
    }
}
