<?php

namespace App\Observers;

use App\CertificationBundleBooking;

class CertificationBundleBookingObserver
{
    /**
     * Handle the certification bundle booking "created" event.
     *
     * @param  \App\CertificationBundleBooking  $booking
     * @return void
     */
    public function created(CertificationBundleBooking $booking)
    {
        //
    }

    /**
     * Handle the certification bundle booking "updated" event.
     *
     * @param  \App\CertificationBundleBooking  $certificationBundleBooking
     * @return void
     */
    public function updated(CertificationBundleBooking $certificationBundleBooking)
    {
        //
    }

    /**
     * Handle the certification bundle booking "deleted" event.
     *
     * @param  \App\CertificationBundleBooking  $certificationBundleBooking
     * @return void
     */
    public function deleted(CertificationBundleBooking $certificationBundleBooking)
    {
        //
    }

    /**
     * Handle the certification bundle booking "restored" event.
     *
     * @param  \App\CertificationBundleBooking  $certificationBundleBooking
     * @return void
     */
    public function restored(CertificationBundleBooking $certificationBundleBooking)
    {
        //
    }

    /**
     * Handle the certification bundle booking "force deleted" event.
     *
     * @param  \App\CertificationBundleBooking  $certificationBundleBooking
     * @return void
     */
    public function forceDeleted(CertificationBundleBooking $certificationBundleBooking)
    {
        //
    }
}
