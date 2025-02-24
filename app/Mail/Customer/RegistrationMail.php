<?php

namespace App\Mail\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Customer;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Customer.
     * 
     * @var \App\Customer
     */
    public $customer;

    /**
     * Password.
     * 
     * @var string.
     */
    public $password;

    /**
     * Create a new message instance.
     *
     * @param  \App\Customer  $customer
     * @param  string  $password
     * @return void
     */
    public function __construct(Customer $customer, $password)
    {
        $this->customer = $customer;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( 'Welcome to ' . config('app.name') )->markdown('mail/customer/registration');
    }
}
