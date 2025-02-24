<?php

namespace App\Mail\Admin\Course;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CourseBooking;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Booking details.
     * 
     * @var \App\CourseBooking
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @param  \App\CourseBooking  $booking
     * @return void
     */
    public function __construct(CourseBooking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Course Registration')
                    ->markdown('mail.admin.course.registration');
    }
}
