<?php

namespace App\Observers;

use App\Venue;
use App\CertificationBooking;

class CertificationBookingObserver
{
    /**
     * Handle the certification booking "created" event.
     *
     * @param  \App\CertificationBooking  $booking
     * @return void
     */
    public function created(CertificationBooking $booking)
    {
        //
    }

    /**
     * Handle the certification booking "updated" event.
     *
     * @param  \App\CertificationBooking  $certificationBooking
     * @return void
     */
    public function updated(CertificationBooking $certificationBooking)
    {
        //
    }

    /**
     * Handle the certification booking "deleted" event.
     *
     * @param  \App\CertificationBooking  $certificationBooking
     * @return void
     */
    public function deleted(CertificationBooking $certificationBooking)
    {
        //
    }

    /**
     * Handle the certification booking "restored" event.
     *
     * @param  \App\CertificationBooking  $certificationBooking
     * @return void
     */
    public function restored(CertificationBooking $certificationBooking)
    {
        //
    }

    /**
     * Handle the certification booking "force deleted" event.
     *
     * @param  \App\CertificationBooking  $certificationBooking
     * @return void
     */
    public function forceDeleted(CertificationBooking $certificationBooking)
    {
        //
    }
}
