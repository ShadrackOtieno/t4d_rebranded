<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Invoice;

class CertificationBundleBooking extends Model
{
    use SoftDeletes, Invoice;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schedule_id', 'schedule_type', 'schedule_cost', 'salutation', 'name', 'designation', 'company_id', 'country', 'phone', 'personal_email', 'work_email', 'currency_code', 'learn_about_us', 'payment_method', 'approved_authority_id', 'certification_bundle_id', 'tax_percentage',
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
     * Certification bundle.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certificationBundle()
    {
        return $this->belongsTo(CertificationBundle::class, 'certification_bundle_id');
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
        return $this->hasMany(CertificationBundleBookingParticipant::class, 'certification_bundle_booking_id');
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
     * Payment logs.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function paymentLogs()
    {
        return $this->morphMany(PaymentLog::class, 'item');
    }

    /**
     * Capitalize name.
     * 
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Capitalize designation.
     * 
     * @return string
     */
    public function getDesignationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Currency.
     * 
     * @return \App\Currency
     */
    public function getCurrencyAttribute()
    {
        return $this->schedule->currencies()->where('code', $this->currency_code)->first();
    }

    /**
     * Booking cost.
     * 
     * @return decimal
     */
    public function getBookingCostAttribute()
    {
        return $this->schedule_cost * ($this->participants->count() + 1);
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
