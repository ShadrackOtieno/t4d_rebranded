<?php

namespace App\Http\Controllers\Backoffice\TrainerIssue\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\TrainerIssue;

class TrainerIssueExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return TrainerIssue::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\TrainerIssue  $trainer_issue
     * @return array
     */
    public function map($trainer_issue): array
    {
        return [
            $trainer_issue->id,
            $trainer_issue->customer->name,
            $trainer_issue->booking_type == 'App\CourseBundleBooking' ? 'Certification' : 'Course',
            @$trainer_issue->booking->{ $trainer_issue->booking_type == 'App\CourseBooking' ? 'course' : 'courseBundle'}->name,

            $trainer_issue->trainers->map( function ($trainer) {

                return $trainer->name;

            })->join(', ', ' and '),

            ucfirst($trainer_issue->status),
            ucfirst($trainer_issue->message)
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
            'Customer',
            'Service',
            'Program',
            'Trainers',
            'Status',
            'Message',
        ];
    }
}