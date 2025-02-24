<?php

namespace App\Program;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DatePeriod;
use DateInterval;

class Intake extends Model
{
    protected $guarded = [];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get duration.
     *
     * @return int
     */
    public function getDurationAttribute()
    {
        $start = new DateTime($this->start_date);
        $end = new DateTime($this->end_date);

        // otherwise the  end date is excluded (bug?)
        $end->modify('+1 day');

        $interval = $end->diff($start);

        // total days
        $days = $interval->days;

        // create an iterateable period of date (P1D equates to 1 day)
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);

        foreach ($period as $dt) {

            $curr = $dt->format('D');

            if ($curr == 'Sat' or $curr == 'Sun')
                // substract if Saturday or Sunday
                $days--;
        }


        return ceil($days/5);
    }
}
