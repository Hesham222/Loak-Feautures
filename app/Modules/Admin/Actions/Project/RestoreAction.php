<?php
namespace Admin\Actions\Project;
use Illuminate\Http\Request;
use Admin\Models\{
    Project
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Project::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
