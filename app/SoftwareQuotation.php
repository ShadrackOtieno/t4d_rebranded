<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Invoice;

class SoftwareQuotation extends Model
{
    use SoftDeletes, Invoice;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'software_id', 'customer_id', 'price', 'country', 'organization', 'licenses', 'additional_requirements',
    ];

    /**
     * Software.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
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
     * Capitalized name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
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
        return 0 + $this->payment_logs_cost;
    }

    /**
     * Tax percentage value.
     * 
     * @return int
     */
    public function getTaxPercentageAttribute()
    {
        return 0;
    }

    /**
     * Tax value.
     * 
     * @return int
     */
    public function getTaxAttribute()
    {
        return 0;
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
