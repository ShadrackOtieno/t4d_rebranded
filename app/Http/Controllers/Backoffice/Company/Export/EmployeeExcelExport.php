<?php

namespace App\Http\Controllers\Backoffice\Company\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Company;

class EmployeeExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Company.
     * 
     * @var \App\Company
     */
    private $company;

    /**
     * Employee status.
     * 
     * @var string
     */
    private $status;

    /**
     * Initialize query customization.
     * 
     * @param  \App\Company  $company
     * @param  string  $status
     * @return void
     */
    public function __construct(Company $company, $status)
    {
        $this->company = $company;
        $this->status = $status;
    }

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return $this->company->{ $this->status.'Employees' }()->latest();
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