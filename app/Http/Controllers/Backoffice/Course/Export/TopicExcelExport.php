<?php

namespace App\Http\Controllers\Backoffice\Course\Export;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Topic;
use App\Subcategory;

class TopicExcelExport implements FromQuery, WithMapping, WithHeadings
{
    
    use Exportable;

    /**
     * Subcategory.
     * 
     * @var \App\Subcategory
     */
    private $subcategory;

    /**
     * Initialize query customization.
     * 
     * @param  \App\Subcategory  $subcategory
     */
    public function __construct(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    /**
     * Prepare a query for an export. Behind the scenes this query is executed in chunks.
     * 
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return $this->subcategory->topics()->latest();
    }

    /**
     * Control the actual source for each column.
     * 
     * @param  \App\Topic  $topic
     * @return array
     */
    public function map($topic): array
    {
        return [
            $topic->id,
            ucfirst($topic->name),
            ucfirst(@$topic->subcategory->name),
            ucfirst(@$topic->subcategory->category->name),
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
            'subcategory',
            'Category',
        ];
    }
}