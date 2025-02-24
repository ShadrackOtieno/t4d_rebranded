<?php

namespace App\Http\Controllers\Backoffice\Course\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\CourseBundle;

class BundleExport implements FromQuery, WithMapping, WithHeadings
{
	
	use Exportable;

	/**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return CourseBundle::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\CourseBundle  $bundle
     * @return array
     */
    public function map($bundle): array
    {
        return [

            $bundle->id,
            $bundle->name,

            $bundle->courses->map( function ($course) {

                return $course->name;

            })->join(', ' , ' and '),

            $bundle->description,
            $bundle->outline,
            $bundle->module,
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
            'Courses',
            'Description',
            'Outline',
            'Module',
        ];
    }
}