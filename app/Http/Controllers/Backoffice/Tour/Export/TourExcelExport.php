<?php

namespace App\Http\Controllers\Backoffice\Tour\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Tour;

class TourExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Tour::query()->join(

            'categories', 'tours.category_id', '=', 'categories.id'

        )->join(

            'subcategories', 'tours.subcategory_id', '=', 'subcategories.id'

        )->selectRaw(

            "tours.*, categories.name AS category, subcategories.name AS subcategory"

        )->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Tour  $tour
     * @return array
     */
    public function map($tour): array
    {
        return [
            $tour->id,
            ucfirst($tour->name),
            ucfirst($tour->category),
            ucfirst($tour->subcategory),
            ucfirst($tour->country),
            ucfirst($tour->city),
            intval($tour->cost),
            $tour->tax,
            $tour->schedule ? date('F j Y', strtotime($tour->schedule)) : 'always available',
            $tour->featured ? 'Yes' : 'No'
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
            'Subcategory',
            'Country',
            'City',
            'Cost',
            'Tax',
            'Schedule',
            'Featured',
        ];
    }
}
