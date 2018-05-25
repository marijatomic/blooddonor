<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmedClaim extends Notification
{
    use Queueable;

    protected  $record;

    public function __construct($record)
    {
        $this->record = $record;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {


        return [

            "record" => $this->record,
            "darivatelj"=>auth()->user(),
            "user" => $notifiable

        ];
    }
}
