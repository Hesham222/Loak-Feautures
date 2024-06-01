<?php
namespace Admin\Actions\Project;

use Illuminate\Http\Request;

use Admin\Models\{
    Project
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Project::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
