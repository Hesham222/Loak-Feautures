<?php
namespace Admin\Actions\Award;
use Illuminate\Http\Request;
use Admin\Models\{
    Award
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Award::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
