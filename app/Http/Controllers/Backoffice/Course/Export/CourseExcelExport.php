<?php

namespace App\Http\Controllers\Backoffice\Course\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Course;

class CourseExcelExport implements FromQuery, WithMapping, WithHeadings
{    
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Course::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Course  $course
     * @return array
     */
    public function map($course): array
    {
        return [
            $course->id,
            ucfirst($course->name),
            ucfirst(@$course->category->name),
            ucfirst(@$course->subcategory->name),
            ucfirst(@$course->topic->name),
            ucfirst(@$course->trainer->name),

            collect($course->event_types)->map( function ($type) {

                switch ($type) {

                    case 'physical':
                        $title = 'Face to Face';
                        break;

                    case 'virtual':
                        $title = 'Virtual';
                        break;

                    case 'elearning':
                        $title = 'E-learning';
                        break;
                    
                    default:
                        $title = '';
                        break;
                }

                return $title;

            })->join(', ', ' and '),

            $course->tours->map( function ($tour) {

                return ucfirst($tour->name);

            })->join(', ' , ' and '),

            $course->software->map( function ($software) {

                return ucfirst($software->name);

            })->join(', ' , ' and '),
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
            'Category',
            'subcategory',
            'Topic',
            'Trainer',
            'Mode of Learning',
            'Recommended Tours',
            'Recommended Software',
        ];
    }
}