<?php

namespace App\Mail\TrainerApplication;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\TrainerApplication;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Application details.
     * 
     * @var \App\TrainerApplication
     */
    public $trainer_application;

    /**
     * Create a new message instance.
     *
     * @param  \App\TrainerApplication  $trainer_application
     * @return void
     */
    public function __construct(TrainerApplication $trainer_application)
    {
        $this->trainer_application = $trainer_application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Trainer Application')->markdown('backoffice/trainer_application/mail/application');
    }
}
