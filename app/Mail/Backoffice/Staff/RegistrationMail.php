<?php

namespace App\Mail\Backoffice\Staff;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Staff;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Staff.
     * 
     * @var \App\Staff
     */
    public $staff;

    /**
     * Password.
     * 
     * @var string
     */
    public $password;

    /**
     * Create a new message instance.
     * 
     * @param  \App\Staff  $staff
     * @param  string  $password
     * @return void
     */
    public function __construct(Staff $staff, $password)
    {
        $staff->load('account');

        $this->staff = $staff;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Registration')->markdown('backoffice.staff.mail.registration');
    }
}
