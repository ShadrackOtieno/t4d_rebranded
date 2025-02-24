<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\CertificationBundle;

class BundleExcelExport implements FromQuery, WithMapping, WithHeadings
{
	use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return CertificationBundle::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\CertificationBundle  $certification_bundle
     * @return array
     */
    public function map($certification_bundle): array
    {
        return [
            $certification_bundle->id,
            ucfirst($certification_bundle->name),
            ucfirst(@$certification_bundle->category->name),
            ucfirst(@$certification_bundle->subcategory->name),
            ucfirst(@$certification_bundle->topic->name),
            ucfirst(@$certification_bundle->trainer->name),

            collect($certification_bundle->event_types)->map( function ($type) {

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

            $certification_bundle->tours->map( function ($tour) {

                return ucfirst($tour->name);

            })->join(', ' , ' and '),

            $certification_bundle->software->map( function ($software) {

                return ucfirst($software->name);

            })->join(', ' , ' and '),

            $certification_bundle->certifications->map( function ($certification) {

                return ucfirst($certification->name);

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
            'Certifications',
        ];
    }
}