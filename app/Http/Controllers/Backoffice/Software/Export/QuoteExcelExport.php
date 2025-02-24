<?php

namespace App\Http\Controllers\Backoffice\Software\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\SoftwareQuotation;

class QuoteExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return SoftwareQuotation::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\SoftwareQuotation  $software_quotation
     * @return array
     */
    public function map($software_quotation): array
    {
        return [
            $software_quotation->id,
            $software_quotation->software->name,
            ucfirst($software_quotation->name),
            $software_quotation->email,
            $software_quotation->phone,
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
            'Software',
            'Name',
            'E-mail Address',
            'Phone Number',
        ];
    }
}