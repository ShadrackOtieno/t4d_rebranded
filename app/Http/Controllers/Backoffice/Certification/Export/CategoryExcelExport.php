<?php

namespace App\Http\Controllers\Backoffice\Certification\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Category;

class CategoryExcelExport implements FromQuery, WithMapping, WithHeadings
{
	use Exportable;

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Category::query()->where('type', 'certification')->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Category  $category
     * @return array
     */
    public function map($category): array
    {
        return [
            $category->id,
            ucfirst($category->name)
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
        ];
    }
}