<?php

namespace App\Http\Controllers\Backoffice\Customer\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Customer;

class CustomerExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Customer::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Customer  $customer
     * @return array
     */
    public function map($customer): array
    {
        return [
            $customer->id,
            $customer->name,
            $customer->account->email,
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
        ];
    }
}