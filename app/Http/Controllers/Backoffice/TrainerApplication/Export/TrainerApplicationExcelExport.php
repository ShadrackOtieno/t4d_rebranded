<?php

namespace App\Http\Controllers\Backoffice\TrainerApplication\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\TrainerApplication;

class TrainerApplicationExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return TrainerApplication::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\TrainerApplication  $trainer_application
     * @return array
     */
    public function map($trainer_application): array
    {
        return [
            $trainer_application->id,
            $trainer_application->name,
            $trainer_application->email,
            $trainer_application->phone,
            $trainer_application->country,
            $trainer_application->city,
            $trainer_application->specialization,
            $trainer_application->comment,
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
            'Country',
            'City',
            'Area of Specialization',
            'Comment',
        ];
    }
}