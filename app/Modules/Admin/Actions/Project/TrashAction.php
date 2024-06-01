<?php
namespace Admin\Actions\Project;
use Illuminate\Http\Request;
use Admin\Models\{
    Project
};
class TrashAction
{
    public function execute(Request $request)
    {
        $record = Project::find($request->resource_id);
        if(!$record)
            return false;
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
