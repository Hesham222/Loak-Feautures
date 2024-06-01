<?php
namespace Admin\Actions\Project;

use Illuminate\Http\Request;

use Admin\Models\{
    ProjectSection
};

class SectionDestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = ProjectSection::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
