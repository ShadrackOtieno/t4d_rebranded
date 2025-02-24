<?php

namespace App\Observers;

use App\CourseBooking;
use App\Venue;
use App\Mail\Course\RegistrationMail as AdminMailNotification;
use Mail;

class CourseBookingObserver
{
    /**
     * Handle the course booking "created" event.
     *
     * @param  \App\CourseBooking  $courseBooking
     * @return void
     */
    public function created(CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Handle the course booking "updated" event.
     *
     * @param  \App\CourseBooking  $courseBooking
     * @return void
     */
    public function updated(CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Handle the course booking "deleted" event.
     *
     * @param  \App\CourseBooking  $courseBooking
     * @return void
     */
    public function deleted(CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Handle the course booking "restored" event.
     *
     * @param  \App\CourseBooking  $courseBooking
     * @return void
     */
    public function restored(CourseBooking $courseBooking)
    {
        //
    }

    /**
     * Handle the course booking "force deleted" event.
     *
     * @param  \App\CourseBooking  $courseBooking
     * @return void
     */
    public function forceDeleted(CourseBooking $courseBooking)
    {
        //
    }
}
