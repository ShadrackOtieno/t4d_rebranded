<?php

namespace App\Http\Controllers\Backoffice\Currency\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Currency;

class CurrencyExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Currency::query()->latest();
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
            strtoupper($currency->code),
            ucfirst($currency->description),
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
            'Code',
            'Description'
        ];
    }
}
