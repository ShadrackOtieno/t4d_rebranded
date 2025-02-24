<?php

namespace App\Http\Controllers\Backoffice\Venue\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Venue;
use App\Currency;

class CurrencyExcelExport implements FromQuery, WithMapping, WithHeadings
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
        return $this->venue->currencies()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Currency  $currency
     * @return array
     */
    public function map($currency): array
    {
        return [
            $currency->id,
            ucwords($currency->code),
            $currency->bank_name,
            $currency->bank_branch,
            $currency->bank_account,
            $currency->swift_code,
            $currency->branch_code,
            $currency->bank_code,
            $currency->tax ? 'Yes' : 'No',
            $currency->description,
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
            'Currency Code',
            'Bank',
            'Bank Branch',
            'Bank Account',
            'Swift Code',
            'Branch Code',
            'Bank Code',
            'Tax',
            'Description',
        ];
    }
}
