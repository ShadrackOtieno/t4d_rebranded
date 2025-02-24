<?php

namespace App\Http\Controllers\Backoffice\Referral\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Referral;

class ReferralExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Referral::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Referral  $referral
     * @return array
     */
    public function map($referral): array
    {
        return [
            $referral->id,
            config('app.url'),
            $referral->name,
            $referral->email,
            $referral->message,
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
            'Course Link',
            'Name',
            'Email',
            'Message',
        ];
    }
}