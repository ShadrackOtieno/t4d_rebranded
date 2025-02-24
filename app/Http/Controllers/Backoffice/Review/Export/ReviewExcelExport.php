<?php

namespace App\Http\Controllers\Backoffice\Review\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Review;

class ReviewExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Review::query()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Review  $review
     * @return array
     */
    public function map($review): array
    {
        switch ($review->item_type) {

            case 'App\Tour':
                $item_name = ucfirst($review->item->name);
                $item_type = 'Tour';
                break;

            case 'App\Course':
                $item_name = ucfirst($review->item->name);
                $item_type = 'Course';
                break;
        }

        return [
            $review->id,
            $review->rating,
            $review->customer->name,
            $review->comment,
            $item_type,
            $item_name,
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
            'Rating',
            'Customer',
            'Comment',
            'Service',
            'Service Name',
        ];
    }
}