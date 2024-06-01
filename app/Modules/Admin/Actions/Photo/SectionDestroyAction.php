<?php
namespace Admin\Actions\Photo;

use Illuminate\Http\Request;

use Admin\Models\{
    PhotoSection
};

class SectionDestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = PhotoSection::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
