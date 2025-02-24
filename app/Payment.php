<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_approved', 'amount', 'status', 'method', 'item_id', 'item_type', 'date_received', 'currency',
        'group_registration', 'participant'
    ];

    /**
     * Get model owning the payment.
     *
     * @return MorphTo
     */
    public function item()
    {
        return $this->morphTo();
    }

    /**
     * Get customer.
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'participant');
    }

    /**
     * Paypal transaction.
     *
     * @return MorphOne
     */
    public function paypal()
    {
        return $this->morphOne(PaypalPayment::class, 'item_payment');
    }

    /**
     * Capitalize payment method name.
     *
     * @return string
     */
    public function getMethodAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Service name.
     *
     * @return string
     */
    public function getServiceNameAttribute()
    {
        switch ($this->item_type) {

            case 'App\CourseBooking':
                $service = @$this->item->course->name;
                break;

            case 'App\TourBooking':
                $service = @$this->item->tour->name;
                break;

            case 'App\CertificationBooking':
                $service = @$this->item->certification->name;
                break;

            case 'App\CertificationBundleBooking':
                $service = @$this->item->certificationBundle->name;
                break;

            case 'App\SoftwareQuotation':
                $service = @$this->item->software->name;
                break;

            default:
                $service = '';
                break;
        }

        return $service;
    }

    /**
     * Type of service.
     *
     * @return string
     */
    public function getServiceAttribute(): string
    {
        switch ($this->item_type) {

            case 'App\CourseBooking':
                $service = 'Course';
                break;

            case 'App\TourBooking':
                $service = 'Tour';
                break;

            case 'App\CertificationBooking':
                $service = 'Certification';
                break;

            case 'App\CertificationBundleBooking':
                $service = 'Certification Bundle';
                break;

            case 'App\HotelReservation':
                $service = 'Hotel Reservation';
                break;

            case 'App\SoftwareQuotation':
                $service = 'Software Quotation';
                break;

            default:
                $service = '';
                break;
        }

        return $service;
    }

    /**
     * No of participants.
     *
     * @return string
     */
    public function getParticipantsAttribute()
    {
        switch ($this->item_type) {

            case 'App\CertificationBooking':
            case 'App\CertificationBundleBooking':
            case 'App\CourseBooking':
                $participants = $this->item->participants()->count() + 1;
                break;

            case 'App\TourBooking':
                $participants = $this->item->participants;
                break;

            default:
                $participants = 1;
                break;
        }

        return $participants;
    }

    /**
     * Service unit price.
     *
     * @return string
     */
    public function getUnitPriceAttribute()
    {
        switch ($this->item_type) {

            case 'App\CourseBooking':
                if($this->item->group == 'Yes' & $this->group_resgistration != 'Yes'){
                    $unit_price = $this->item->schedule_cost / $this->item->bookingParticipants->count();
                }else{
                    $unit_price = $this->item->schedule_cost;
                }
                break;

            case 'App\TourBooking':
                $unit_price = $this->item->cost;
                break;

            case 'App\CertificationBundleBooking':
            case 'App\CertificationBooking':
                $unit_price = $this->item->schedule_cost;
                break;

            case 'App\SoftwareQuotation':
                $unit_price = $this->item->price;
                break;

            default:
                $unit_price = 0;
                break;
        }

        return $unit_price;
    }
}
