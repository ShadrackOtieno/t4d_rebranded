<?php

namespace App\Http\Controllers\Backoffice\Certification\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Certification;

class CertificationExcelExport implements FromQuery, WithMapping, WithHeadings
{    
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Certification::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Certification  $certification
     * @return array
     */
    public function map($certification): array
    {
        return [
            $certification->id,
            ucfirst($certification->name),
            ucfirst(@$certification->category->name),
            ucfirst(@$certification->subcategory->name),
            ucfirst(@$certification->topic->name),
            ucfirst(@$certification->trainer->name),

            collect($certification->event_types)->map( function ($type) {

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

            $certification->tours->map( function ($tour) {

                return ucfirst($tour->name);

            })->join(', ' , ' and '),

            $certification->software->map( function ($software) {

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