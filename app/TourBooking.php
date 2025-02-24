<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Invoice;
use DateTime;

class TourBooking extends Model
{
    use SoftDeletes, Invoice;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'first_name', 'phone', 'participants', 'message', 'email', 'tour_id', 'customer_id', 'from', 'to', 'country', 'meals', 'transport', 'airport_pickup', 'accommodation', 'currency_code', 'tax_percentage', 'cost',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total_cost'];

    /**
     * Tour.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

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
     * Tour review.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function review()
    {
        return $this->hasOne(TourReview::class, 'booking_id');
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
     * Full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return ucwords("$this->first_name $this->last_name");
    }

    /**
     * Currency.
     * 
     * @return \App\Currency
     */
    public function getCurrencyAttribute()
    {
        return $this->tour->currencies()->where('code', $this->currency_code)->first();
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
        return $this->cost * $this->participants + $this->payment_logs_cost;
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

    /**
     * Get duration.
     *
     * @return int
     */
    public function getDurationAttribute()
    {
        $start = new DateTime($this->from);
        $end = new DateTime($this->to);
        
        // otherwise the  end date is excluded (bug?)
        $end->modify('+1 day');
        
        $interval = $end->diff($start);
        
        // total days
        $days = $interval->days;
        
        return $days;
    }
}
