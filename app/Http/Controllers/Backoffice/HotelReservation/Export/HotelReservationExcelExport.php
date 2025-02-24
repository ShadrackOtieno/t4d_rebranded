<?php

namespace App\Http\Controllers\Backoffice\HotelReservation\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\HotelReservation;

class HotelReservationExcelExport implements FromQuery, WithMapping, WithHeadings
{    
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return HotelReservation::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\HotelReservation  $reservation
     * @return array
     */
    public function map($reservation): array
    {
        return [
            $reservation->id,
            $reservation->created_at->format('F j Y'),
            ucwords($reservation->name),
            $reservation->phone,
            $reservation->email,
            date('F j Y', strtotime($reservation->check_in)),
            date('F j Y', strtotime($reservation->check_out)),
            $reservation->flight,
            $reservation->rooms,
            $reservation->visa ? 'Yes' : 'No',
            $reservation->airport_transfer ? 'Yes' : 'No',
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
            'Application Date',
            'Customer',
            'Phone Number',
            'Email Address',
            'Check In',
            'Check Out',
            'Flight',
            'No. of Rooms',
            'Visa',
            'Airport Transfer',
        ];
    }
}