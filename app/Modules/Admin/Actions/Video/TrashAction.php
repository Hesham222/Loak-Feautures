<?php
namespace Admin\Actions\Video;
use Admin\Models\ProjectCategory;
use Illuminate\Http\Request;
use Admin\Models\{
    Video
};
class TrashAction
{
    public function execute(Request $request)
    {
        $record = Video::find($request->resource_id);
        if(!$record)
            return false;
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
