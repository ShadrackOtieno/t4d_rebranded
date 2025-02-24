<?php

namespace App\Observers;

use App\HotelReservation;
use App\Venue;
use App\Mail\HotelReservation\ReservationMail;
use Mail;

class HotelReservationObserver
{
    /**
     * Handle the hotel reservation "created" event.
     *
     * @param  \App\HotelReservation  $reservation
     * @return void
     */
    public function created(HotelReservation $reservation)
    {
        Mail::to(

            Venue::whereCountry($reservation->customer->country)->first()->email ?? config('mail.admin.address')

        )->send( new ReservationMail($reservation) );
    }

    /**
     * Handle the hotel reservation "updated" event.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return void
     */
    public function updated(HotelReservation $hotelReservation)
    {
        //
    }

    /**
     * Handle the hotel reservation "deleted" event.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return void
     */
    public function deleted(HotelReservation $hotelReservation)
    {
        //
    }

    /**
     * Handle the hotel reservation "restored" event.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return void
     */
    public function restored(HotelReservation $hotelReservation)
    {
        //
    }

    /**
     * Handle the hotel reservation "force deleted" event.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return void
     */
    public function forceDeleted(HotelReservation $hotelReservation)
    {
        //
    }
}
