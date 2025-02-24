<?php

namespace App\Mail\Program;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Program\BrochureDownload;
use App\Program\Program;

class BrochureDownloadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $program;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Program $program)
    {
        $this->program = $program;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pathToFile = storage_path('app/public/Brochures/' . $this->program->brochure);

        return $this->subject(
            "{$this->program->name} Brochure"
        )
        ->attach($pathToFile)->markdown('mail/program/brochure-download');
    }
}
