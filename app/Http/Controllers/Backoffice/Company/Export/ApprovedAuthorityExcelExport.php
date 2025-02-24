<?php

namespace App\Http\Controllers\Backoffice\Company\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Company;

class ApprovedAuthorityExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Company.
     * 
     * @var \App\Company
     */
    private $company;

    /**
     * Initialize query customization.
     * 
     * @param  \App\Company  $company
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return $this->company->approvedAuthorities()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\ApprovedAuthority  $approved_authority
     * @return array
     */
    public function map($approved_authority): array
    {
        return [
            $approved_authority->id,
            $approved_authority->name,
            $approved_authority->email,
            $approved_authority->phone,
            $approved_authority->designation,
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
            'Designation',
        ];
    }
}