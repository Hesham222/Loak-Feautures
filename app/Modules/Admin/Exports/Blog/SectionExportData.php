<?php

namespace Admin\Exports\Blog;

use Maatwebsite\Excel\Concerns\FromCollection;

class SectionExportData implements FromCollection
{
    private $records;

    public function __construct($records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        $records = $this->records;
        $data = collect([]);
        $data->push(['Id', 'Name','Blog','Section Type','Order','Created at']);
        foreach ($records as $record) {
            $data->push([
                $record->id,
                $record->name,
                $record->Blog->name,
                $record->BlogSectionType->name,
                $record->order,
                date('d M Y', strtotime($record->created_at)) ." - ". date('h:i a', strtotime($record->created_at))
            ]);
        }
        return $data;
    }
}
