<?php
namespace Admin\Actions\Video;
use Illuminate\Http\Request;
use Admin\Models\{
    Video
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Video::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
