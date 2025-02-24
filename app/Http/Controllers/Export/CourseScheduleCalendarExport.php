<?php

namespace App\Http\Controllers\Export;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\PhysicalClass;
use App\VirtualClass;

class CourseScheduleCalendarExport implements FromCollection, WithMapping, WithHeadings
{
	use Exportable;

	/**
	 * Query filters.
	 *
	 * @var array
	 */
	private $filters;

	/**
	 * Perform nitializions.
	 *
	 * @param  array  $filters
	 * @return void
	 */
	public function __construct($filters)
	{
		$this->filters = $filters;
	}

	/**
	 * Fetch records.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function collection()
    {
        # face to face

        // $physical_schedules = array_key_exists('period', $this->filters) ? collect([]) : PhysicalClass::when( @$this->filters['year'], function($query, $year) {

        //     $query->whereYear('from', $year);

        // })->selectRaw(

        //     "physical_classes.id, physical_classes.from, physical_classes.to, physical_classes.booking_end, 'physical' AS type, physical_classes.course_id, physical_classes.city_id, Null AS period"

        // )->with(['course', 'currencies'])->limit(40000)->get();
        $physical_schedules = array_key_exists('period', $this->filters) ? collect([]) : PhysicalClass::when( @$this->filters['year'], function($query, $year) {
    
        $query->whereYear('from', $year);

        })->where('from', '>=', now()) // Fetch only future dates including today
        ->selectRaw(
            "physical_classes.id, physical_classes.from, physical_classes.to, physical_classes.booking_end, 'physical' AS type, physical_classes.course_id, physical_classes.city_id, Null AS period"
        )->with(['course', 'currencies'])->limit(1000)->get();


        # virtual

        $virtual_schedules = array_key_exists('physical', $this->filters) ? collect([]) : VirtualClass::when( @$this->filters['year'], function($query, $year) {

            $query->whereYear('from', $year);

        })->when( @$this->filters['period'], function ($query, $period) {

            $query->wherePeriod($period);

        })->selectRaw(

            "virtual_classes.id, virtual_classes.from, virtual_classes.to, virtual_classes.booking_end, 'virtual' AS type, virtual_classes.course_id, Null AS city_id, virtual_classes.period"

        )->with(['course', 'currencies'])->limit(1000)->get();

        # concatenate the schedules
        $schedules = $physical_schedules->concat($virtual_schedules)->sortBy('from');
        # filter by duration

        if ( array_key_exists('duration', $this->filters) )

            $schedules = $schedules->filter( function ($schedule) {

                return $schedule->duration == $this->filters['duration'];
            });

        return $schedules;
    }

    /**
    * Transform each record.
    *
    * @param  mixed  $schedule
    * @return array
    */
    public function map($schedule): array
    {
    	# get cost by local and international currencies

    	$local_currency = @$schedule->currencies->firstWhere('code', $this->filters['currency']);

    	if ( empty($local_currency) )

    		$local_cost = '';

    	else

    		$local_cost = "$local_currency->code " . number_format($local_currency->pivot->amount);

    	$international_cost = 'USD ' . number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount );

    	# generate record for each column

        return [

            @$schedule->course->code,
            @$schedule->course->name,

            date('j M', strtotime($schedule->from)) . ' - ' . date('j M', strtotime($schedule->to)),

            $schedule->duration . ' ' . ngettext('day', 'days', $schedule->duration),

            $schedule->period,

            $schedule->type == 'virtual' ? 'Virtual' : "{$schedule->city->name}, {$schedule->city->venue->country}",

            "$local_cost $international_cost"
        ];
    }

    /**
     * Column headings.
     *
     * @return array
     */
    public function headings(): array
    {
        return [

            'Code',
            'Title',
            'Date',
            'Duration',
            'Period',
            'Location',
            'Fees'
        ];
    }
}
