<?php

namespace App\Http\Controllers\Backoffice\Tour\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\TourBooking;
use App\Tour;

class BookingExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Tour.
     * 
     * @var \App\Tour
     */
    private $tour;

    /**
     * Initialize query customization.
     * 
     * @param  \App\Tour  $tour
     */
    public function __construct(Tour $tour)
    {
        $this->tour = $tour;
    }

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return $this->tour->bookings()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\TourBooking  $booking
     * @return array
     */
    public function map($booking): array
    {
        return [
            $booking->id,
            @$booking->tour->name,
            $booking->created_at->format('F j Y'),
            date('F j Y', strtotime($booking->from)),
            date('F j Y', strtotime($booking->to)),
            "$booking->first_name $booking->last_name",
            $booking->email,
            $booking->phone,
            $booking->country,
            $booking->participants,
            $booking->meals ? 'Yes' : 'No',
            $booking->transport,
            $booking->airport_pickup ? 'Yes' : 'No',
            $booking->accommodation ? 'Yes' : 'No',
            $booking->message,
            $booking->tax_percentage,
            $booking->currency_code,
            $booking->total_cost,
        ];
    }

    /**
     * The heading to be added as very first row of the sheet.
     * 
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Tour',
            'Application Date',
            'Start Date',
            'End Date',
            'Customer',
            'Email Address',
            'Phone Number',
            'Country',
            'Participants',
            'Meals',
            'Transport',
            'Airport Pickup',
            'Accommodation',
            'Message',
            'Tax Percentage',
            'Currency Code',
            'Total Cost',
        ];
    }
}
