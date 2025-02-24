<?php

namespace App\Observers;

use App\TourBooking;
use App\Venue;
use App\Mail\Tour\BookingMail;
use Mail;

class TourBookingObserver
{
    /**
     * Handle the tour booking "created" event.
     *
     * @param  \App\TourBooking  $booking
     * @return void
     */
    public function created(TourBooking $booking)
    {
        //
    }

    /**
     * Handle the tour booking "updated" event.
     *
     * @param  \App\TourBooking  $tourBooking
     * @return void
     */
    public function updated(TourBooking $tourBooking)
    {
        //
    }

    /**
     * Handle the tour booking "deleted" event.
     *
     * @param  \App\TourBooking  $tourBooking
     * @return void
     */
    public function deleted(TourBooking $tourBooking)
    {
        //
    }

    /**
     * Handle the tour booking "restored" event.
     *
     * @param  \App\TourBooking  $tourBooking
     * @return void
     */
    public function restored(TourBooking $tourBooking)
    {
        //
    }

    /**
     * Handle the tour booking "force deleted" event.
     *
     * @param  \App\TourBooking  $tourBooking
     * @return void
     */
    public function forceDeleted(TourBooking $tourBooking)
    {
        //
    }
}
