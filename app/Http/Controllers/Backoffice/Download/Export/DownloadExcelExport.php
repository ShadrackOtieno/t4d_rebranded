<?php

namespace App\Http\Controllers\Backoffice\Download\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Download;

class DownloadExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Download::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Download  $download
     * @return array
     */
    public function map($download): array
    {
        return [
            $download->id,
            $download->name,
            $download->email,
            $download->phone,
            $download->organization,
            $download->designation,
            $download->document,
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
            'E-mail Address',
            'Phone Number',
            'Organization',
            'Designation',
            'Document',
        ];
    }
}