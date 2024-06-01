<?php
namespace Admin\Actions\ProjectCategory;
use Illuminate\Http\Request;
use Admin\Models\{
    ProjectCategory
};
class TrashAction
{
    public function execute(Request $request)
    {
        $record = ProjectCategory::find($request->resource_id);
        if(!$record)
            return false;
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
