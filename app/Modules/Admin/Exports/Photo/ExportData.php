<?php

namespace Admin\Exports\Photo;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportData implements FromCollection
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
        $data->push(['Id','Photo Category','Colour', 'Created at']);
        foreach ($records as $record) {
            $data->push([
                $record->id,
                $record->PhotoCategory->name,
                $record->colour?$record->colour:"None",
                date('d M Y', strtotime($record->created_at)) ." - ". date('h:i a', strtotime($record->created_at))
            ]);
        }
        return $data;
    }
}
