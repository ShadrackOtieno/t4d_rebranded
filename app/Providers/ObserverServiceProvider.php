<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\CourseBookingObserver;
use App\CourseBooking;
use App\Observers\PaymentObserver;
use App\Payment;
use App\Observers\PaypalPaymentObserver;
use App\PaypalPayment;
use App\Observers\TourBookingObserver;
use App\TourBooking;
use App\Observers\SoftwareQuotationObserver;
use App\SoftwareQuotation;
use App\Observers\HotelReservationObserver;
use App\HotelReservation;
use App\Observers\CertificationBookingObserver;
use App\CertificationBooking;
use App\Observers\CertificationBundleBookingObserver;
use App\CertificationBundleBooking;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        CourseBooking::observe(CourseBookingObserver::class);
        
        Payment::observe(PaymentObserver::class);

        PaypalPayment::observe(PaypalPaymentObserver::class);

        TourBooking::observe(TourBookingObserver::class);

        SoftwareQuotation::observe(SoftwareQuotationObserver::class);

        HotelReservation::observe(HotelReservationObserver::class);

        CertificationBooking::observe(CertificationBookingObserver::class);

        CertificationBundleBooking::observe(CertificationBundleBookingObserver::class);
    }
}
