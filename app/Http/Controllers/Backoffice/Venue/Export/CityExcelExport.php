<?php

namespace App\Http\Controllers\Backoffice\Venue\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Venue;
use App\City;

class CityExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Venue.
     *
     * @var \App\Venue
     */
    public $venue;

    /**
     * Initialization.
     *
     * @param  \App\Venue  $venue
     * @return void
     */
    public function __construct(Venue $venue)
    {
    	$this->venue = $venue;
    }

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return $this->venue->cities()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\City  $city
     * @return array
     */
    public function map($city): array
    {
        return [
            $city->id,
            ucfirst($city->name),
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
            'Name',
        ];
    }
}
