<?php

namespace App\Http\Controllers\Backoffice\Staff\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Staff;

class StaffExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Staff::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Staff  $staff
     * @return array
     */
    public function map($staff): array
    {
        return [
            $staff->id,
            $staff->name,
            $staff->account->email,
            $staff->phone,
            $staff->account->role,
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
            'Role',
        ];
    }
}