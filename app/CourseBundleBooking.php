<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseBundleBooking extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_bundle_id', 'schedule_id', 'customer_id', 'schedule_type', 'amount', 'salutation', 'name', 'designation', 'company_id', 'country', 'phone', 'personal_email', 'work_email', 'approved_authority_id', 'currency', 'learn_about_us', 'payment_method',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total_cost'];

    /**
     * Customer.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Approved authority.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedAuthority()
    {
        return $this->belongsTo(ApprovedAuthority::class, 'approved_authority_id');
    }

    /**
     * Company.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Currency.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    /**
     * Course bundle.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseBundle()
    {
        return $this->belongsTo(CourseBundle::class, 'course_bundle_id');
    }

    /**
     * Course schedule.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function schedule()
    {
        return $this->morphTo();
    }

    /**
     * Participants.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants()
    {
        return $this->hasMany(CourseBundleBookingParticipant::class, 'course_bundle_booking_id');
    }

    /**
     * Recommended software.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function software()
    {
        return $this->belongsToMany(Software::class)->withPivot('cost', 'licenses');
    }

    /**
     * Recommended tours.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class)->withPivot('cost', 'participants');
    }

    /**
     * Payment.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function payment()
    {
        return $this->morphOne(Payment::class, 'item');
    }

    /**
     * Customer issue.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function issue()
    {
        return $this->morphOne(TrainerIssue::class, 'booking');
    }

    /**
     * Customer review.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function review()
    {
        return $this->hasOne(CourseBundleReview::class, 'booking_id');
    }

    /**
     * Booking cost.
     * 
     * @return decimal
     */
    public function getBookingCostAttribute()
    {
        $tax = $this->schedule->tax;

        $booking_cost = ($this->schedule_cost + $tax / 100 * $this->schedule_cost) * ($this->participants->count() + 1);

        return $booking_cost;
    }

    /**
     * Tours cost.
     * 
     * @return decimal
     */
    public function getToursCostAttribute()
    {
        $tours_cost = 0;

        foreach ($this->tours as $tour) {
            
            $tours_cost += $tour->pivot->cost * $tour->pivot->participants;
        }

        return $tours_cost;
    }

    /**
     * Software cost.
     * 
     * @return decimal
     */
    public function getSoftwareCostAttribute()
    {
        $software_cost = 0;

        foreach ($this->software as $software) {
            
            $software_cost += $software->pivot->cost * $software->pivot->licenses;
        }

        return $software_cost;
    }

    /**
     * Total cost.
     * 
     * @return decimal
     */
    public function getTotalCostAttribute()
    {
        return $this->booking_cost + $this->tours_cost + $this->software_cost;
    }
}
