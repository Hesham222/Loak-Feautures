<?php

namespace Admin\Exports\Photo;

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
        $data->push(['Id', 'Name','Photo','Section Type','Order','Created at']);
        foreach ($records as $record) {
            $data->push([
                $record->id,
                $record->name,
                $record->Photo->id,
                $record->PhotoSectionType->name,
                $record->order,
                date('d M Y', strtotime($record->created_at)) ." - ". date('h:i a', strtotime($record->created_at))
            ]);
        }
        return $data;
    }
}
