<?php

namespace App;

use Decimal\Decimal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Invoice;

class CourseBooking extends Model
{
    use SoftDeletes, Invoice;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total_cost'];

    /**
     * Customer.
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Customer.
     *
     * @return HasMany
     */
    public function bookingParticipants(): HasMany
    {
        return $this->hasMany(GroupRegistrationParticipants::class, 'booking_id');
    }

    /**
     * Approved authority.
     *
     * @return BelongsTo
     */
    public function approvedAuthority(): BelongsTo
    {
        return $this->belongsTo(ApprovedAuthority::class, 'approved_authority_id');
    }

    /**
     * Company.
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Course.
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Course schedule.
     *
     * @return MorphTo
     */
    public function schedule(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Participants.
     *
     * @return HasMany
     */
    public function participants(): HasMany
    {
        return $this->hasMany(CourseBookingParticipant::class, 'course_booking_id');
    }

    /**
     * Recommended software.
     *
     * @return BelongsToMany
     */
    public function software(): BelongsToMany
    {
        return $this->belongsToMany(Software::class)->withPivot('cost', 'licenses');
    }

    /**
     * Recommended tours.
     *
     * @return BelongsToMany
     */
    public function tours(): BelongsToMany
    {
        return $this->belongsToMany(Tour::class)->withPivot('cost', 'participants');
    }

    /**
     * Customer review.
     *
     * @return HasOne
     */
    public function review(): HasOne
    {
        return $this->hasOne(CourseReview::class, 'booking_id');
    }

    /**
     * Customer issue.
     *
     * @return MorphOne
     */
    public function issue(): MorphOne
    {
        return $this->morphOne(TrainerIssue::class, 'booking');
    }

    /**
     * Payment.
     *
     * @return MorphOne
     */
    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'item');
    }

    /**
     * Payment logs.
     *
     * @return MorphMany
     */
    public function paymentLogs(): MorphMany
    {
        return $this->morphMany(PaymentLog::class, 'item');
    }

    /**
     * Capitalize name.
     *
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Capitalize designation.
     *
     * @return string
     */
    public function getDesignationAttribute($value): string
    {
        return ucfirst($value);
    }

    /**
     * Currency.
     *
     * @return Currency
     */
    public function getCurrencyAttribute()
    {
        return $this->schedule->currencies()->where('code', $this->currency_code)->first();
    }

    /**
     * Booking cost.
     *
     * @return float|int
     */
    public function getBookingCostAttribute()
    {
        return $this->schedule_cost * ($this->participants->count() + 1);
    }

    /**
     * Tours cost.
     *
     * @return float|int
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
     * @return float|int
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
     * Payment logs cost.
     *
     * @return decimal
     */
    public function getPaymentLogsCostAttribute()
    {
        return $this->paymentLogs->reduce( function ($total, $payment) {
            if ($payment->effect == 'increase')
                $total += $payment->amount;
            else
                $total -= $payment->amount;

            return $total;
        }, 0);
    }

    /**
     * Subtotal cost.
     *
     * @return decimal
     */
    public function getSubtotalCostAttribute()
    {
        return $this->booking_cost + $this->tours_cost + $this->software_cost + $this->payment_logs_cost;
    }

    /**
     * Tax value.
     *
     * @return int
     */
    public function getTaxAttribute()
    {
        return $this->tax_percentage / 100 * $this->subtotal_cost;
    }

    /**
     * Total cost.
     *
     * @return decimal
     */
    public function getTotalCostAttribute()
    {
        return $this->tax + $this->subtotal_cost;
    }
}
