<?php

namespace App\Http\Controllers\Backoffice\Certification\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Subcategory;
use App\Category;

class SubcategoryExcelExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * Category.
     * 
     * @var \App\Category
     */
    private $category;

    /**
     * Initialize query customization.
     * 
     * @param  \App\Category  $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Subcategory::query()->join(

            'categories', 'subcategories.category_id', '=', 'categories.id'

        )->where('subcategories.category_id', $this->category->id)->selectRaw(

            "subcategories.*, categories.name AS category"

        )->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Subcategory  $subcategory
     * @return array
     */
    public function map($subcategory): array
    {
        return [
            $subcategory->id,
            ucfirst($subcategory->name),
            ucfirst($subcategory->category),
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
            'Category'
        ];
    }
}
