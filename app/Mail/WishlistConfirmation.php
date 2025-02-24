<?php

// app/Mail/WishlistConfirmation.php
namespace App\Mail;

use App\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WishlistConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $courseName;
    public $fullName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($courseName, $fullName)
    {
        $this->courseName = $courseName;
        $this->fullName = $fullName;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Wishlist Confirmation')
                    ->view('emails.wishlist_confirmation');
    }
}
