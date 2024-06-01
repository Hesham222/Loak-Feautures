<?php
namespace Admin\Actions\PhotoCategory;;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoCategory
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = PhotoCategory::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
