<?php

namespace App\Http\Controllers\Backoffice\Venue\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Venue;

class VenueExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Venue::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Venue  $venue
     * @return array
     */
    public function map($venue): array
    {
        return [
            $venue->id,
            ucfirst($venue->country),
            $venue->email,
            $venue->phone,
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
            'Country',
            'Email Address',
            'Phone Number',
        ];
    }
}
