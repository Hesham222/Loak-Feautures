<?php
namespace Admin\Actions\ProjectCategory;

use Illuminate\Http\Request;

use Admin\Models\{
    ProjectCategory
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = ProjectCategory::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
