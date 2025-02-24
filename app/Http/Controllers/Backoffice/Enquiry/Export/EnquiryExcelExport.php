<?php

namespace App\Http\Controllers\Backoffice\Enquiry\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Enquiry;

class EnquiryExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Enquiry::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Enquiry  $enquiry
     * @return array
     */
    public function map($enquiry): array
    {
        return [
            $enquiry->id,
            $enquiry->name,
            $enquiry->email,
            $enquiry->message,
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
            'Email',
            'Message',
        ];
    }
}