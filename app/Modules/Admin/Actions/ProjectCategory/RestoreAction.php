<?php
namespace Admin\Actions\ProjectCategory;
use Illuminate\Http\Request;
use Admin\Models\{
    ProjectCategory
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = ProjectCategory::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
