<?php
namespace Admin\Actions\PhotoCategory;
use Admin\Models\PhotoCategory;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoCategory
};
class TrashAction
{
    public function execute(Request $request)
    {
        $record = PhotoCategory::find($request->resource_id);
        if(!$record)
            return false;
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
