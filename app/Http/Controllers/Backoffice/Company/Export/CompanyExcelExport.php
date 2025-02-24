<?php

namespace App\Http\Controllers\Backoffice\Company\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Company;

class CompanyExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Company::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Company  $Company
     * @return array
     */
    public function map($company): array
    {
        return [
            $company->id,
            $company->name,
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