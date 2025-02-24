<?php

namespace App\Http\Controllers\Backoffice\Software\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Software;

class SoftwareExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Software::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Software  $software
     * @return array
     */
    public function map($software): array
    {
        return [
            $software->id,
            ucfirst($software->name)
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
