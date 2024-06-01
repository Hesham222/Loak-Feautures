<?php
namespace Admin\Actions\Photo;
use Illuminate\Http\Request;
use Admin\Models\{
    Photo
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Photo::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
